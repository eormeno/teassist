extends Control

# Paths to index scene
const INDEX_SCENE_PATH = "res://index.tscn"

# Called when the node enters the scene tree for the first time.
func _ready() -> void:
	pass # Replace with function body.


# Called every frame. 'delta' is the elapsed time since the previous frame.
func _process(_delta: float) -> void:
	pass


func _on_button_pressed() -> void:
	var código = $"%LineEdit".text
	if código == "123456":
		save_code(código)
		get_tree().change_scene_to_file(INDEX_SCENE_PATH)
	else:
		$"%ErrorLabel".text = "Còdigo incorrecto!"

# Save the code to local storage
func save_code(code: String) -> void:
	var config = ConfigFile.new()
	config.set_value("code", "value", code)
	config.save("user://stored_code.cfg")
