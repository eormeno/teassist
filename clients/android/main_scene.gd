extends Control

@onready var http_request = $HTTPRequest
@onready var nombres_label = $Nombres
@onready var apellidos_label = $Apellidos
@onready var texture_rect = $TextureRect

var base_url = "http://127.0.0.1:8000/api/patient-activities/"

func _ready():
	# Conectar el callback para la solicitud HTTP
	http_request.request_completed.connect(_on_request_completed)
	
	# Recuperar código almacenado y hacer la solicitud
	var stored_code = get_stored_code()
	if stored_code != "":
		hacer_solicitud(stored_code)
	else:
		push_error("Error: Código almacenado no encontrado.")

# Realiza una solicitud HTTP GET
func hacer_solicitud(code: String):
	var url = base_url + code
	var error = http_request.request(url, [], false, "GET")  # Cambiado a "GET" en lugar de HTTPClient.METHOD_GET
	if error != OK:
		push_error("Error en la solicitud HTTP: " + str(error))

# Callback ejecutado cuando la solicitud HTTP se completa
func _on_request_completed(_result: int, response_code: int, _headers: Array, body: PackedByteArray):
	if response_code != 200:
		push_error("Error en la solicitud HTTP. Código de respuesta: " + str(response_code))
		return
	
	# Analizar el JSON recibido
	var json = JSON.new()
	var error = json.parse(body.get_string_from_utf8())
	
	if error != OK:
		push_error("Error al analizar el JSON: " + str(error))
		return
		
	var data = json.get_data()
	
	if not data is Dictionary:
		push_error("Error: La respuesta no es un diccionario válido")
		return
		
	if not data.has("patient") or not data.has("activities"):
		push_error("Error: El JSON no contiene las claves esperadas ('patient' o 'activities').")
		return
		
	actualizar_interfaz(data)

# Actualiza los datos en la interfaz con los resultados de la solicitud
func actualizar_interfaz(data: Dictionary):
	var paciente = data["patient"]
	var activities = data["activities"]
	
	# Actualizar etiquetas con información del paciente
	nombres_label.text = paciente.get("nombres", "N/A")
	apellidos_label.text = paciente.get("apellidos", "N/A")
	
	# Manejar la imagen Base64 de la primera actividad
	if activities.size() > 0 and activities[0].has("activity_thumbnail"):
		var img = base64_to_image(activities[0]["activity_thumbnail"])
		if img:
			var texture = ImageTexture.create_from_image(img)
			texture_rect.texture = texture
		else:
			push_error("Error al convertir la imagen Base64 a textura.")
	else:
		push_error("Error: No se encontraron actividades o falta 'activity_thumbnail'.")

# Recupera el código almacenado desde un archivo de configuración
func get_stored_code() -> String:
	var config = ConfigFile.new()
	var err = config.load("res://stored_code.cfg")
	if err != OK:
		push_error("Error al cargar el archivo de configuración.")
		return ""
	return config.get_value("code", "value", "")

# Decodifica una imagen en Base64 a una textura
func base64_to_image(base64_string: String) -> Image:
	var img = Image.new()
	var decoded_data = Marshalls.base64_to_raw(base64_string)
	
	if decoded_data.size() == 0:
		push_error("Error: La cadena Base64 no es válida o está vacía.")
		return null
		
	var error = img.load_jpg_from_buffer(decoded_data)
	if error != OK:
		push_error("Error al cargar la imagen desde el búfer.")
		return null
		
	return img
