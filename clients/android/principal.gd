extends Control

# Called when the node enters the scene tree for the first time.
func _ready() -> void:
	var codigo = get_stored_code()
	print("El código almacenado es: ", codigo)
	$HTTPRequest.request_completed.connect(_on_request_completed)
	$HTTPRequest.request("https://api.github.com/repos/godotengine/godot/releases/latest")

func _on_request_completed(_result, _response_code, _headers, body):
	var json = JSON.parse_string(body.get_string_from_utf8())
	print(json["name"])

func get_stored_code() -> String:
	var config = ConfigFile.new()
	var err = config.load("res://stored_code.cfg")
	if err == OK:
		return config.get_value("code", "value", "")
	else:
		return ""
