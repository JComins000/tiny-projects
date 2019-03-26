https://www.youtube.com/playlist?list=WL&disable_polymer=true

visit this link and paste the one-liner into the inspector console. It's the worst one-liner ever, I know.
if i were to pretend i was good at programming and cared about having readable code i would write this:

```javascript
toHours = function(x){return ~~(x/3600)}
toMinutes = function(x){return ~~(x%3600/60)}
toSeconds = function(x){return x%60}
timeMap = [toHours,toMinutes,toSeconds]

timestampElements = document.getElementsByClassName('timestamp')
timestamps = Array.prototype.map.call(timestampElements, (timestamp) => timestamp.childNodes[0].innerHTML.split(':'))
secondStamps = Array.prototype.map.call(timestamps, timestamps.reduce((x,y) => 60*x+parseInt(y)))
totalSeconds = secondStamps.reduce((x,y) => x+y)
totalTime = timeMap.map(fn => fn(totalSeconds)).join(':')
```
