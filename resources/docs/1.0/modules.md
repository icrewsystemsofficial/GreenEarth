# App Modules

---

- [Tree Management](#section-1)
- [User Management](#section-2)
- [Activity Management](#section-3)
- [Announcement Management](#section-4)
- [Badge Configuration](#section-5)
<a name="section-1"></a>

## Tree Management

The GreenEarth initiative, as the name suggests, is very much related to the planting and upkeep of trees so that carbon emissions could be offset. With this module, the user has the ability to create, update and delete entire trees from the database. Furthermore, maintenance performed on a particular tree (e.g., watering) can also be logged. Maintenance records allow the user to view the history of a tree and to be able to trace the story of its health over time.

### Viewing all Trees

![A table of trees planted.](/screenshots/trees_index.PNG)


Here, the Administrator is greeted to a table showing all of the current trees recorded in the system. They can get a quick glance of the id of the tree alongside vital details such as its date of planting, when it was last maintained by a volunteer and current health. Furthermore, there are buttons to add a new tree to the system and to manage the existing trees. Search option is provided to facilitate the user to find desired tree.
Volunteers (users without Administrator privileges) are able to add or manage records pertaining to a particular tree. 

### Adding a Tree

![A form to add a new tree.](/screenshots/trees_add.PNG)


Once the user expresses their intention to add a new tree to the system, they will be prompted to fill out a form. Details such as the forest id, species id, mission id, health and location (in latitudes and logitudes) are to be entered. 

### Managing a Tree

![A form to manage an existing tree.](/screenshots/trees_manage.PNG)


Updating information about a tree is made simple. In order to maintain familiarity and increase efficiency, the user is greeted to an almost-identical form to the one for adding new trees to the system. Here, they are able to replace outdated details with current information. 

Basic information like date of planting and last updation date are provided. Buttons are provided to add maintenance to the respective tree and to delete the tree. In addition to these, few buttons are provided to view linked forest linked plant species and linked mission. 

Deleting a tree is as simple as clicking a button and confirming the  decision to do so.

### Viewing the Maintenance History of a Tree

![A table showing the maintenance history of a particular tree.](/screenshots/updates_history.png)

<br/>
Users can have a quick glance at the maintenance that has been performed on a tree over its lifetime with the GreenEarth initiative. The user is able to view vital information such as the type of maintenance alongside when it was performed. The user can also quickly discern the story of the health of a tree over time.
<br/><br/>

![More information about a particular maintenance record.](/screenshots/tree_updates_view.png)

<br/>
If they are not satisfied with the current level of information about a particular maintenance record, the user can also view more information. They are shown all of the details that have been entered by the volunteer maintaining the tree.

### Adding a Tree Maintenance Record

![A form to document maintenance performed on a tree.](/screenshots/add_updates.png)

<br/>
Trees require regular maintenance. Here, a volunteer can quickly document maintenance they have performed on a particular tree. They can add an image of tree along with it's health status and remarks.

<a name="section-2"></a>

## User (Volunteer) Management

Volunteers are at the heard of the GreenEarth initiative. Without their unbridled generosity, it would be next to impossible to neutralise carbon emissions! For the Administrator, it is of paramount importance than they are able to view information about all of their current volunteers in a manner that is effective and efficient.

### View all Users

![A table of users.](path)

Upon loading the `/users` URL extension, the Administrator is greeted to a table showing all of the current users recorded in the system. Here, they can also take actions such as updating or deleting users.

### Create a User

![A form to create a new user.](path)

Through this form, an Administrator can add information about prospective users of the system. They have the option to add their name, email address and to set their privileges on the system. Once done, the prospective user will be receive an email to set up their account.

### Invite a User

![Email invitation to set up an account.](path)

The prospective user will receive an email at the provided address once they have been invited by an Administrator. They will be prompted to proceed to the website and finish setting up their account.

![The sign up page.](path)

Once they have expressed their desire to set up their account, the prospective user will be directed to a sign up page wherein they can provide their name, email and password credentials. Validation has been baked in to ensure that data integrity is maintained.

### Updating & Deleting a User

![A table of users.](path)

Updating information about a user is made simple. In order to maintain familiarity and increase efficiency, the Administrator is greeted to an almost-identical form to the one for inviting new users to the system. Here, they are able to replace outdated details with current information.
Deleting a user from the system is as simple as clicking a button and confirming the decision to do so.

<a name="section-3"></a>

## Activity Management

The simple-yet-difficult task of _doing_ is at the heart of a volunteers' organisation. With this module, the Administrator can quickly get up to speed with all of the work their volunteers have performed.

### View all Activity

![A table of users.](path).

Through this table, the Administrator can view all activities that have been performed recently. Details regarding the type of activity, volunteer name and the time of activity are provided.

<a name="section-4"></a>

## Announcement Management

Alongside keeping track of all activity, it is vital that the Administrator is able to broadcast announcements to their volunteers. With this module, announcements can be made with ease.

### View all Announcements

![A table of announcements.](path).

All users on the system are able to view announcements that have been issued by Administrators.

Administrators have the privilege to make and update announcements.

### Make an Announcement

![A form to issue an announcement.](path).

Here, the Administrator can write up an announcement which would be issued to all users of the system.

### Update an Announcement

![A form to update an announcement.](path).

Here, the Administrator can edit the details of previous announcements.


<a name="section-5"></a>

## Badge Configuration

### CSS link 
This link needs to placed inside the head tag
```html
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/icrewsystemsofficial/GreenEarth@master/public/css/badge.css">
```
### Html tags 
This needs to placed before the ending of the body tag 
```html
<span data-api-id="APIKEY">
        <a href="javascript:void(0);" id="ge_btn" class="ge_btn" 
        style="text-decoration: none;">
        <img src="http://greenearth.test/api/v1/badge/APIKEY"/>
           Carbon neutral website
        </a>
    <div id="ge_modal" class="modal">
      <!-- Modal content -->
      <div class="modal-content" id="ge_modal_content">
        <span class="ge_modal_close">&times;</span>
          <div class="ge_iframe" id="iframe_wrapper">
              <div class="iframe_loader" id="ge_iframe_loader"></div>
          </div>
      </div>
    </div>
</span>
```

### Js link 
This needs after the above html tags
```html
<script src="https://cdn.jsdelivr.net/gh/icrewsystemsofficial/GreenEarth@thirumalai/public/js/badge.js"></script>
```


