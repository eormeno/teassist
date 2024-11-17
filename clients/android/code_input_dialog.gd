extends Control

# Paths to index scene
const INDEX_SCENE_PATH = "res://index.tscn"
	
func _on_button_pressed() -> void:
	var código = $"%LineEdit".text
	$HTTPRequest.request("http://127.0.0.1:8000/api/patient-activities/" + código)

# Save the code to local storage
func save_code(code: String) -> void:
	var config = ConfigFile.new()
	config.set_value("code", "value", code)
	config.save("res://stored_code.cfg")

func _on_http_request_request_completed(_result: int, _response_code: int, _headers: PackedStringArray, body: PackedByteArray) -> void:
	var json = JSON.parse_string(body.get_string_from_utf8())
	if json['status'] == 0:
		$"%ErrorLabel".text = json['message']
	else:
		$"%ErrorLabel".text =""
		var código = $"%LineEdit".text
		save_code(código)
		get_tree().change_scene_to_file(INDEX_SCENE_PATH)
