extends Sprite2D

# Velocidad de movimiento del sprite
var speed = 600

func _process(delta):
	var direction = Vector2.ZERO

	# Movimiento con las flechas del teclado
	if Input.is_action_pressed("ui_right"):
		direction.x += 1
	if Input.is_action_pressed("ui_left"):
		direction.x -= 1
	if Input.is_action_pressed("ui_down"):
		direction.y += 1
	if Input.is_action_pressed("ui_up"):
		direction.y -= 1

	# Movimiento con las teclas WASD
	if Input.is_action_pressed("move_right"):
		direction.x += 1
	if Input.is_action_pressed("move_left"):
		direction.x -= 1
	if Input.is_action_pressed("move_down"):
		direction.y += 1
	if Input.is_action_pressed("move_up"):
		direction.y -= 1

	# Normalizar la dirección para evitar movimiento más rápido en diagonal
	if direction != Vector2.ZERO:
		direction = direction.normalized()

	# Mover el sprite
	position += direction * speed * delta
