extends Node

# Rutas a otras escenas
const MAIN_SCENE_PATH = "res://Principal.tscn"
const CODE_INPUT_SCENE_PATH = "res://Codigo.tscn"

# Valor del código almacenado
var stored_code: String

func _ready():
	# Verifica si hay un código almacenado en la configuración local
	stored_code = get_stored_code()
	
	if not stored_code:
		# Si no hay un código almacenado, carga la escena de entrada de código
		call_deferred("load_code_input_scene")
	else:
		# Si hay un código almacenado, carga la escena principal
		call_deferred("load_main_scene")

func get_stored_code() -> String:
	# Implementa la lógica para recuperar el código del almacenamiento local
	var config = ConfigFile.new()
	var err = config.load("res://stored_code.cfg")
	if err == OK:
		return config.get_value("code", "value", "")
	else:
		return ""

func load_main_scene():
	get_tree().change_scene_to_file(MAIN_SCENE_PATH)

func load_code_input_scene():
	get_tree().change_scene_to_file(CODE_INPUT_SCENE_PATH)
