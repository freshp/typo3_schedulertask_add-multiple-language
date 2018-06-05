# typo3 schedulertask to add multiple language domains

This repository should make a problem with multiple languages in a typo3 scheduler tasks reproducible.

get further [informations](https://stackoverflow.com/questions/50680928/select-records-from-other-languages-in-a-scheduler-task)

## install

```
"repositories": [
	...
    {
        "type": "vcs",
        "url": "https://github.com/freshp/typo3_schedulertask_add-multiple-language.git"
    }
],
"require": {
	...
	"freshp/typo3_schedulertask_add-multiple-language": "dev-master"
}
``` 

### config
* add one additional `sys_language`
* install the extension in the extension manager
* add scheduler job

### run
* simply run the scheduler-task in the backend

## open question
* how to update the domains in the correct language?
