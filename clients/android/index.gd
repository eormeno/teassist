extends Node

# Paths to other scenes
const MAIN_SCENE_PATH = "res://MainScene.tscn"
const CODE_INPUT_SCENE_PATH = "res://CodeInputDialog.tscn"

# Stored code value
var stored_code: String

func _ready():
	# Check if there is a stored code in local storage
	stored_code = get_stored_code()
	
	if not stored_code:
		# If there is a stored code, call deferred to load the MainScene
		# change_scene_to_file is a blocking call, so we call it deferred
		call_deferred("load_code_input_scene")
	else:
		# If no stored code, load the MainScene
		call_deferred("load_main_scene")

func get_stored_code() -> String:
	# Implement logic to retrieve code from local storage
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
