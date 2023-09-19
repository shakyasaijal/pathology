from flask import Flask, request
import json
import pandas as pd
import pickle
import numpy as np
import os
from dotenv import load_dotenv

load_dotenv('../../app/config/.env')

app = Flask(__name__)

# Load the pickle model
with open('./pathology.pkl', 'rb') as file:
    model = pickle.load(file)


@app.route('/predict', methods=['POST'])
def predict():
    try:
        data = request.json
        data_frame = pd.DataFrame(data, index=[0])
        prediction = model.predict(data_frame)
        return json.dumps(int(prediction[0]))
    except Exception as e:
        return json.dumps('There was a server load. Please try again.')


if __name__ == '__main__':
    app.run(host=os.getenv('HOST_FOR_PYTHON'), port=os.getenv('PORT_FOR_PYTHON'))
