You will create a program that logs your exercise activity and calculates the number of calories burned. The formula for determining calorie burn is:

    Male:
        ((-55.0969 + (0.6309 * HR) + (0.438278456 0.090174 * W) + (0.2017 * A)) / 4.184) * T
    Female:
        ((-20.4022 + (0.4472 * HR) – (0.278443506 0.057288 * W) + (0.074 * A)) / 4.184) * T

Where:

    HR: Heart rate (in beats/minute)
    W: Weight (in pounds)
    A: Age (in years)
    T: Exercise duration time (in minutes)

This formula was taken from http://www.shapesense.com/fitness-exercise/calculators/heart-rate-based-calorie-burn-calculator.shtml

Minimum Requrements

    Must have an Edit Profile page for entering:
        First name
        Last name
        Gender
        Birthdate
        Weight (in pounds)
        A button to save the profile
    Edit Profile must have access restricion
    Must have a Log Exercise page for entering:
        Type of exercise. You should have at least 4 exercises to choose from (e.g. running, walking, weightlifing, other, etc.)
        Date of exercise
        Time (in minutes)
        Average heart rate
        A button to log the exercise. When pressing this button, the program must calculate the calories you burned and display the number of calories burned on this page, and log the exercise (including calories burned) to the database.
    Must have a View Profile page that will display:
        First name
        Last name
        Gender
        Birthdate
        Weight (in pounds)
        The View Profile page must also display a table with the latest exercise entries (up to the last 15):
            Displayed from newest to oldest
            Each entry displayed will list:
                the date of the exercise
                the type of exercise
                the time in minutes
                the average heart rate
                the calories burned
                Each entry must contain a link to remove it from the database
    You must have a database with an exercise_log table that contains the following fields:
        id (set as the primary key)
        user_id (for linking to the exercise_user table
        date
        type
        time_in_minutes
        heartrate
    Your database will also have an exercise_user table that contains the following fields:
        id (st as the primary key)
        first_name
        last_name
        gender
        birthdate
        weight

NOTE: creating a separate table for users is more useful if you were to create a login system for multiple users. See extra credit below.

    All field entries must be validated
    All field entries must be sticky

Extra Credit: 5 points

    Add the ability to have multiple users
    This will require you to add a password column to the exercise_user table
