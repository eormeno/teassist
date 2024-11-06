extends Control
# Ruta a la escena de índice
const INDEX_SCENE_PATH = "res://index.tscn"

func save_code(code: String) -> void:
	var config = ConfigFile.new()
	config.set_value("code", "value", code)
	config.save("res://stored_code.cfg")

func _on_button_pressed() -> void:
	var código = $"%LineEdit".text
	if código == "123456":
		save_code(código)
		get_tree().change_scene_to_file(INDEX_SCENE_PATH)
	else:
		$"%MensajeError".text = "Còdigo incorrecto!"
