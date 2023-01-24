document.body.addEventListener( 'click', function ( event ) {
    let element = event.target.id;
    let pointValue = 0;
    let userID = 0;
    if(element.startsWith("up")){
        let data = element.split("_");
        pointValue = data[1];
        userID = data[2];
        let result = updatePoints(pointValue, userID);
    }

});

const updatePoints = (pointValue, userID) => {

    let data = "{'pointValue': '"+pointValue+"', 'userID': '"+userID+"'}";
    var obj = new Object();
   obj.pointValue = pointValue;
   obj.userID  = userID;
   
   var jsonString= JSON.stringify(obj);
    fetch("updatePoints.php", {
        method: 'post',
        body: jsonString,
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        }
    }).then((response) => {
        let points = document.getElementById('points_' + userID);
        let originalPoints = points.innerHTML;
        points.innerHTML = parseInt(originalPoints) + parseInt(pointValue);
        return response.json()
    }).then((res) => {
        if (res.status === 201) {
            console.log("Post successfully created!")
        }
    }).catch((error) => {
        console.log(error)
    })

};
