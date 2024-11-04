extends Sprite2D

# Velocidad de movimiento del sprite
var speed = 600

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

	# Normalizar la dirección para evitar movimiento más rápido en diagonal
	if direction != Vector2.ZERO:
		direction = direction.normalized()

	# Mover el sprite
	position += direction * speed * delta
