# Application Structure
The application has a number of subdomains, some of which point to other apps and some of which are included in this application.
List of subdomains:
- Clients: Serves up Plutio, for client management
- Resources: serves up a Wordpress application for content.
- Surveys: Displays the publicly accessible surveys
- Admin: For admin users, mainly to administer surveys  and cold outreach
- Hello: Used to personalise landing pages for cold outreach
- Partners: A way for people who refer (affiliates) to view the progress of those they refer
For now the routes are all defined in the web.php but if this becomes unwieldy, then I’ll split them out into individual files for each subdomain.

## Modules
Generally, I’ve tried to spit up the Models, Factories, Seeders, Views and Controllers into modules, to make it easier to navigate.
These modules generally map to the subdomains.
Currently, these are the modules (folders):
- Surveys: Anything to do with the public facing survey, or the admin interface for surveys
- Clients: Generally anything to do with clients, including:
	- Survey owner
	- List of employees to send survey to
	- Progress of a client from lead to client (mainly for partners)
- Partners: The logic to display data for anyone who’s referring in clients
- Outreach: The logic and views for cold outreach
- Admin: user management, client & partner management, integrations, settings etc
The models, factories, seeders controllers and views will all sit in one of these folders.

## Views Directory
The folder structure:
- partials: any partials, organised into subfolders (e.g. partials/admin)
- components: any anonymous components, organised into subfolders (e.g. components/admin)
- livewire: any livewire components, organised into subfolders (e.g. livewire/admin)
- {module}: E.g. surveys/index.blade.php
Generally, a view will exist for each route, however, views usually pull in components or partials.
For example:
- The index view for surveys will simply pull in a Livewire table view component
- The public facing ‘about’ page will pull in a partial
**Why partials AND components?**
**The components** tend to be reusable templates. They are found under the ‘components’ directory.
**The partials** are mainly used for reusable content that does not rely on data from the DB.
(By creating partials of public-facing content, I can reuse this on different pages, for example easily building a landing page from existing blocks of content.)

## Livewire Components
These are generally sections of a page, like create/edit forms and tables. These will have an associated class found in app/Http/Livewire.
In most cases an admin view will pull in a Livewire component, e.g. create/edit a resource or display a table
