from flask import Flask, render_template
from config import ProdConfig

app = Flask('')
app.config.from_object(ProdConfig)

@app.route('/')
def index():
    name = app.config['APP_NAME']

    return render_template("index.html", appName=name)

@app.route('/jump')
def jump():
    return render_template("jump.html")

app.run(host="0.0.0.0", port=8088)
