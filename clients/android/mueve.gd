extends Sprite2D

@export var speed = 200
@export var rotation_speed = 2

func _ready() -> void:
	centrar()
	
func centrar():
	var pantalla : Rect2 = get_viewport_rect()
	position.x = pantalla.size.x / 2
	position.y = pantalla.size.y / 2

func _process(delta):
	var direction = Vector2.ZERO
	# Movimiento con las teclas WASD y flechas del cursor
	if Input.is_action_pressed("right"):
		direction.x += 1
	if Input.is_action_pressed("left"):
		direction.x -= 1
	if Input.is_action_pressed("down"):
		direction.y += 1
	if Input.is_action_pressed("up"):
		direction.y -= 1
	if Input.is_action_pressed("centrar"):
		centrar()

	# Normalizar la dirección para evitar movimiento más rápido en diagonal
	if direction != Vector2.ZERO:
		direction = direction.normalized()

	# Mover el sprite
	position += direction * speed * delta
	rotation += rotation_speed * delta
