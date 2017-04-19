# 447-Public-Arduino

### OVERVIEW
A web based application where users can schedule a time to code a remote arduino with a variety of parts visible through webcam using a web based IDE designed as a tool for beginners and instructors. From the IDE, users will be able to select from different tutorials and base code to change and build off of. The scheduling interface will prioritize “instructor” users when setting up individual times from a week calendar, and a queuing system will be implemented for those who want to start as soon as the arduino is available.
### PARTS
#### Scheduling System

##### Appointments
 - Calendar based system for those looking to make a reservation, times available will be shown to users in 15-30 minute time chunks on a 7 day weekly calendar for the week the user is currently viewing. 
 - When booking, Users will be asked if they are an instructor or an individual
 - Time preference given to instructors.
 - Notify users of when their time is about to start.

##### Queuing
 - Users looking to start as soon as possible can enter the waiting queue for the arduino, possibly with a view to the arduino that the other user is currently working on.
 - Audible notification/ browser notification when the user’s time has started.
 - Users get 15 minutes or the time until the next appointment starts.
 - Users can continue to work with the arduino after the 15 minutes if there are no users in the waiting queue and there is no appointment scheduled for that time. 

#### Arduino IDE
- Interactive text editor similar to the Arduino editor.
- Users can choose code to build off of from a variety of available tutorials. 
- Users should be provided with parameters of the different sensors while coding. 
- Webcam should be visible to the user while coding, as well as reset buttons for the arduino.
- Possibly interactive tutorials for the user (rather than just editing the code provided).
#### Backend/Etc
- Scheduling system needs some sort of database/data handling for user information
- User login database and required security features
- Notifications
- Script running to compile the code inputted and send it off to the arduino
- Complications lay in how to compile arduino C independent from the original Arduino Sketch IDE and displaying resulting compiler error messages.
- The actual arduino hardware setup
