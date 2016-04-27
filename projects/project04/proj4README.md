Developemnt Project Space

Project Specifications

User Story:
As a learning programmer, I want an application that tracks various aspects of projects that I'm working on 
so that I can stay organized in my efforts and connect with others that may be interested in my work. 

Project Goals:
To create an application that tracks personal development projects.
- Project Backlog: a list of projects that I want to do, prioritized.
- Current Project: Tracks status, hours worked, start date, goal end date
- Completed Projects: Stores a retrospective, review of application, languages/frameworks used, challenges faced, what was learned
- A means to connect with people interested in my work: fellow programmers, employers, etc.

Nice-to-haves:
- Some form of integration or linking with Github repo
- Drag and drop functionality

Deliverable increments:
1. Project Backlog
    a. login and admin add/delete.
    b. public homepage that displayes backlog - design modularly
2. Current Project
    a. Specifications met
    b. Current project module added to home page
3. Completed Projects
    a. Completion/cessation workflow (possible retrospective screen on complete/end action)
    b. Completed project module added to homepage
4. Prioritization of Backlog: create ranking field that allows many re-ranks
5. Github integration to link projects to their respective repo
6. Drag and drop backlog prioritization in admin view


    
Project 4 high level design

// Project Backlog
// Confirm Desired fields
// Build front end backlog item form
// Design and create DB and projects table
// Test Correct Database insertion
// Add Backlog view to index
// Add Page Security and create login

// Current Project
// Add status table to DB and link to projects table
// Add Current project fields to DB
// Add current project selector to admin ui
// Create and Display Current Project View on index

// Retrospective
// Create and link Retrospective table in DB
// Add retrospective ui to admin page or as a fired page when complete button clicked