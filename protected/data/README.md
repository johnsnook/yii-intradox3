# Intradox import notes

The process involves first using a tool, in this case EMS SQL Manager, to create export scripts from the pdms database that can then be uploaded to this directory where they can be run from the command line using psql.  Once imported into the id2 schema, the final_adjacent_intradox_import script can be run.


### Initial Export

- using EMS SQL, connect to the pdms database
- open each table, select data tab
- click "export data as script" on the left sidebar
- when the wizard appears, load the appropriate template

##### id2 tables:
* newfields_user
* project
* document
* author
* topic
* type

##### id3 tables:
* person
* project
* document
* log