Upload user (CLI only)
======================

This plugin allows to use CLI script to upload user in Moodle 3.8 and Moodle 3.9. This functionality
is included in the standard distribution of Moodle 3.10.

To print help execute:
```
sudo -u www-data php admin/tool/uploadusercli/cli/uploaduser.php --help
```

Output of the help command on the default installation (some defaults may be different on your site):
```
Command line Upload user tool.

Options:
-h, --help                    Print out this help.
--file=PATH                   Path to CSV file with the user data. Required.
--delimiter_name=VALUE        CSV delimiter:
                                comma - ,
                                semicolon - ;
                                colon - :
                                tab - \t
                                Default: comma
--encoding=VALUE              Encoding
                                Default: UTF-8
--uutype=VALUE                Upload type:
                                0 - Add new only, skip existing users
                                1 - Add all, append number to usernames if
                              needed
                                2 - Add new and update existing users
                                3 - Update existing users only
                                Default: 0
--uupasswordnew=VALUE         New user password:
                                0 - Field required in file
                                1 - Create password if needed and send via email
                                Default: 1
--uuupdatetype=VALUE          Existing user details:
                                0 - No changes
                                1 - Override with file
                                2 - Override with file and defaults
                                3 - Fill in missing from file and defaults
                                Default: 0
--uupasswordold=VALUE         Existing user password:
                                0 - No changes
                                1 - Update
                                Default: 0
--uuforcepasswordchange=VALUE Force password change:
                                1 - Users having a weak password
                                0 - None
                                2 - All
                                Default: 1
--uuallowrenames=VALUE        Allow renames:
                                0 - No
                                1 - Yes
                                Default: 0
--uuallowdeletes=VALUE        Allow deletes:
                                0 - No
                                1 - Yes
                                Default: 0
--uuallowsuspends=VALUE       Allow suspending and activating of accounts:
                                0 - No
                                1 - Yes
                                Default: 1
--uustandardusernames=VALUE   Standardise usernames:
                                0 - No
                                1 - Yes
                                Default: 1
--uulegacy1=VALUE             (Original Student) typeN=1:
                                5 - Student (student)
                                4 - Non-editing teacher (teacher)
                                3 - Teacher (editingteacher)
                                1 - Manager (manager)
                                Default: 5
--uulegacy2=VALUE             (Original Teacher) typeN=2:
                                5 - Student (student)
                                4 - Non-editing teacher (teacher)
                                3 - Teacher (editingteacher)
                                1 - Manager (manager)
                                Default: 3
--uulegacy3=VALUE             (Original Non-editing teacher) typeN=3:
                                5 - Student (student)
                                4 - Non-editing teacher (teacher)
                                3 - Teacher (editingteacher)
                                1 - Manager (manager)
                                Default: 4
--username=VALUE              Username template
--email=VALUE                 Email address
--auth=VALUE                  Choose an authentication method:
                                manual - Manual accounts
                                nologin - No login
                                email - Email-based self-registration
                                Default: manual
--maildisplay=VALUE           Email display:
                                0 - Hide my email address from non-privileged
                              users
                                1 - Allow everyone to see my email address
                                2 - Allow only other course members to see my
                              email address
                                Default: 2
--emailstop=VALUE             Disable notifications:
                                0 - This email address is enabled
                                1 - This email address is disabled
                                Default: 0
--mailformat=VALUE            Email format:
                                0 - Plain text format
                                1 - Pretty HTML format
                                Default: 1
--maildigest=VALUE            Email digest type:
                                0 - No digest (single email per forum post)
                                1 - Complete (daily email with full posts)
                                2 - Subjects (daily email with subjects only)
                                Default: 0
--autosubscribe=VALUE         Forum auto-subscribe:
                                1 - Yes: when I post, subscribe me to that forum
                              discussion
                                0 - No: don't automatically subscribe me to
                              forum discussions
                                Default: 1
--city=VALUE                  City/town
--country=VALUE               Select a country
--timezone=VALUE              Timezone
                                Default: Europe/Berlin
--lang=VALUE                  Preferred language:
                                en - English ‎(en)‎
                                Default: en
--description=VALUE           Description
--url=VALUE                   Web page
--idnumber=VALUE              ID number
--institution=VALUE           Institution
--department=VALUE            Department
--phone1=VALUE                Phone
--phone2=VALUE                Mobile phone
--address=VALUE               Address

Example:
$sudo -u www-data /usr/bin/php admin/tool/uploadusercli/cli/uploadusercli.php --file=PATH
```

Example output:
---------------

When used with the file [example.csv](example.csv) included in this plugin:

```
$ sudo -u www-data php admin/tool/uploadusercli/cli/uploaduser.php --file=../example.csv
Line 2
  New user
  Warning: Password: Generated in cron
Line 3
  New user
  Warning: Password: Generated in cron
Line 4
  New user
  Warning: Password: Generated in cron

```

Documentation
-------------

https://docs.moodle.org/310/en/Upload_users - documentation for Moodle LMS version 3.10
