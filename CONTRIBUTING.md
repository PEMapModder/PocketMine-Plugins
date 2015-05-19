#Contributing
When contributing to this repository, please make sure you are following the guidelines.

###Issues
- Do not spam issues. You will be blocked from this repository if you do so.
- Make sure the issue has not been reported yet.
- Please check if the issue you want to report, or anything similar to the issue, has been reported yet.
- Please make sure it is one of the plugins in this repository that caused the crash before reporting it.

###Pull Requests
- Do not spam pull requests. You will be blocked from this repository if you do so.
- Please put only one feature per pull request.

###Syntax
- Code must be using proper syntax.
- Ending brackets for control structures must not be on the same line as the next control structure.
```php
//Correct
public function checkPlayerName(Player $player){
    if($player->getName() === "Player"){
    }
    else{
    }
}
//Incorrect
public function checkPlayerName(Player $player){
    if($player->getName() === "Player"){
    }else{
    }
}
```
- Files must not have an `?>` at the end.
- Indents must be exactly 4 spaces.
```php
//Correct
public function getPlayerName(Player $player){
    return $player->getName();
}
//Incorrect
public function getPlayerName(Player $player){
        return $player->getName();
}
```
- Long arrays must be split over multiple lines.
```php
//Correct
public function storeNames(){
    $names = array(
        "Notch",
        "Player",
        "Steve",
        "Test"
    );
}
//Incorrect
public function storeNames(){
    $names = array("Notch", "Player", "Steve", "Test");
}
```
- Opening braces must stay on the same line and must not have spaces before them.
```php
//Correct
public function onEnable(){
}
//Incorrect
public function onEnable()
{
}
//Also incorrect
public function onEnable() {
}
```
- Strings must be double quotes(`""`), but use single quotes(`''`) only when it is necessary.
