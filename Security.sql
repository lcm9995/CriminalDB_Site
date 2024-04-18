CREATE ROLE Developer;

GRANT SELECT, INSERT, UPDATE, DELETE ON Aliases TO Developer WITH GRANT OPTION;
GRANT SELECT, INSERT, UPDATE, DELETE ON Crimes TO Developer WITH GRANT OPTION;
GRANT SELECT, INSERT, UPDATE, DELETE ON Prob_officer TO Developer WITH GRANT OPTION;
GRANT SELECT, INSERT, UPDATE, DELETE ON Sentencing TO Developer WITH GRANT OPTION;
GRANT SELECT, INSERT, UPDATE, DELETE ON Crime_codes TO Developer WITH GRANT OPTION;
GRANT SELECT, INSERT, UPDATE, DELETE ON Crime_charges TO Developer WITH GRANT OPTION;
GRANT SELECT, INSERT, UPDATE, DELETE ON Officers TO Developer WITH GRANT OPTION;
GRANT SELECT, INSERT, UPDATE, DELETE ON Crime_officers TO Developer WITH GRANT OPTION;
GRANT SELECT, INSERT, UPDATE, DELETE ON Appeals TO Developer WITH GRANT OPTION;

GRANT Developer TO 'dev_one' WITH GRANT OPTION;




CREATE ROLE Viewer;

GRANT SELECT ON Aliases TO Viewer WITH GRANT OPTION;
GRANT SELECT ON Crimes TO Viewer WITH GRANT OPTION;
GRANT SELECT ON Prob_officer TO Viewer WITH GRANT OPTION;
GRANT SELECT ON Sentencing TO Viewer WITH GRANT OPTION;
GRANT SELECT ON Crime_codes TO Viewer WITH GRANT OPTION;
GRANT SELECT ON Crime_charges TO Viewer WITH GRANT OPTION;
GRANT SELECT ON Officers TO Viewer WITH GRANT OPTION;
GRANT SELECT ON Crime_officers TO Viewer WITH GRANT OPTION;
GRANT SELECT ON Appeals TO Viewer WITH GRANT OPTION;

GRANT Viewer to 'viewer_one';
