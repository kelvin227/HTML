from flask import Flask, request, jsonify, render_template
import requests
import random
import smtplib
import string

app = Flask(__name__)
email_state = {
    'waiting_for_email' : False,
    'waiting_for_verfication_code': False,
    'verification_code' : None,
    'email': None
}

state = False
name_state = False
name = 'none'
@app.route('/')
def index():
    return render_template('index.html')

@app.route('/chat', methods=['POST'])
def chat():
    user_message = request.form['message']
    response = generate_response(user_message)
    return jsonify({'response': response})

@app.route('/get_data', methods=['GET'])
def get_data():
    data = get_data_from_php()
    return jsonify(data)

def generate_response(message):
    global state
    global name
    global name_state
    global email_state

    response = []
    # Basic response logic

#change email code
    if email_state['waiting_for_verfication_code']:
        #verify the code
        if message.strip() == email_state['verification_code']:
            email_state['waiting_for_verification_code'] = False
            response.append('Thank you! your email has been verified')
        else:
            response.append('invalid code. please try again')
    if email_state['waiting_for_email']:
        email = message.strip()
        email_state['email'] = email
        email_state['verification_code'] = generate_verification_code()
        email_state['waiting_for_email'] = False
        email_state['waiting_for_verfication_code'] = True

        send_verification_email(email, email_state['verification_code'])
        response.append('A verification ode has been sent to your email. please enter the code to onfirm to your email address')

    

    if 'change email' in message.lower():
        email_state['waiting_for_email'] = True
        response.append('Please provide your email address')
#end of chamge email code

    if 'get data' in message.lower():
        #fetch data from PHP script
        data = get_data_from_php()
        #data2 = get_data_from_php(data2)
        return f"Data from PHP: {data}"
        #response.append("Data from PHP:" + data)

    if 'hello' in message.lower():
        response.append('Hi there! How can I help you?')
    if 'help' in message.lower():
        response.append('what can i help you with??')
    if 'account' in message.lower():
        response.append('What is the problem with your account?')
    if 'who owns codegator' in message.lower():
        response.append('kelvin Ngene')

    if state:
        if 'yes' in message.lower():
            response.append('codegator is a software that provides digital services to people around the world[describe codegator]')
            state = False
            
        else:
            state= False
            response.append('okay let me know if there is anything else you want to know')

    if 'codegator' in message.lower():
        state = True
        response.append('would you like me to tell you about codegator?')

#end of change name code
    if name_state:
        name =  message.strip()
        name_state = False
        send_data_to_php({'name': name})
        response.append(f'are you sure your name is? {name}')
    else:
        name_state = False

    if 'update name' in message.lower():
        name_state = True
        response.append('What is your name?')
#end of change account name
    
    if not response:
        response.append('I am not sure how to respond to that.')
    return response
def generate_verification_code(length=6):
    return ''.join(random.choices(string.ascii_uppercase + string.digits, k=length))

def send_verification_email(email, code):
    from_email = 'codegatorinc@gmail.com'
    from_password = '@Kelly27'
    subject = 'your Verification Code'
    body = f'Your verification is: {code}'
    message = f'Subject: {subject}\n\{body}'

    try:
        with smtplib.SMTP('codegatorinc@gmail.com', 587) as server:
            server.startls()
            server.login(from_email, from_password)
            server.sendemail(from_email, email, message)
            print("email sent successfully.")
    except Exception as e:
        print("failed to send email", e) 

def send_data_to_php(name):
    url = 'http://127.0.0.1/HTML/test.php'
    try:
        response = requests.post(url, data=name)
        if response.status_code == 200:
            print("data sent successfully")
        else:
            print("failed to send data. Status code:", response.status_code)
    except requests.exceptions.RequestException as e:
        print("request failed", e)

def get_data_from_php():
    url = "http://127.0.0.1/HTML/test.php"
    try:
        response = requests.get(url)
        if response.status_code == 200:
            data = response.json()
            data1  = data["data1"]
            data2 = data["data2"]
        else:
            return{"error": "Failed to retrieve data, Status code:" + str(response.status_code)}
    except requests.exceptions.RequestException as e:
        return{"error": "request failed: " + str(e)}
if __name__ == '__main__':
    app.run(port=5000)
