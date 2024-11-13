extends Control

func _ready() -> void:
	$HTTPRequest.request_completed.connect(_on_request_completed)
	var code = get_stored_code()
	$HTTPRequest.request("http://127.0.0.1:8000/api/patient-activities/" + code)

func _on_request_completed(_result, _response_code, _headers, body):
	var json = JSON.parse_string(body.get_string_from_utf8())
	var paciente = json['patient']
	var activities = json['activities']
	$Nombres.text = paciente['nombres']
	$Apellidos.text = paciente['apellidos']
	$TextureRect.texture = base64_to_image(activities[0]['activity_thumbnail'])

func get_stored_code() -> String:
	# Implement logic to retrieve code from local storage
	var config = ConfigFile.new()
	var _err = config.load("res://stored_code.cfg")
	return config.get_value("code", "value", "")

func base64_to_image(base64_string: String) -> Image:
	print(base64_string)
	var img = Image.new()
	#'image' is the resulted base64 string from the API
	img.load_jpg_from_buffer((base64_string).to_ascii_buffer())
	return img
