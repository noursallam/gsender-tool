import smtplib
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart
import datetime

debuglevel = 0

smtp_server = 'smtp.gmass.co'
smtp_port = 587
sender_email = 'malcolmn404@gmail.com'
password = ' ba8ad973c5a245ee82dad7b56bdb4681'

smtp = smtplib.SMTP(smtp_server, smtp_port)
smtp.set_debuglevel(debuglevel)
smtp.starttls()
smtp.login(sender_email, password)

print('Enter the from address:')
from_addr = input()

print('Enter the to address:')
to_addr = input()

print('Enter the subject:')
subj = input()

print('Enter message type (text/html):')
message_type = input()

print('Enter message text:')
message_text = input()
msg = MIMEMultipart()
msg.attach(MIMEText(message_text, 'plain'))



msg['From'] = from_addr
msg['To'] = to_addr
msg['Subject'] = subj

smtp.sendmail(sender_email, to_addr, msg.as_string())
smtp.quit()