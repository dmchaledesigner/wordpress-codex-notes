media queries

add to head of html

<meta name="HandheldFriendly" content="True"/>
<meta name="MobileOptimized" content="320"/>
<meta name="TabletOptimized" content="768"/>
<meta name="viewport" id="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>



then add the query based on device width


Mobile:
@media only screen and (min-width:0) and (max-width:320px){

//CSS rules here

}



Mobile:
@media only screen and (min-width:0) and (max-width:480px){

//CSS rules here

}



Tablet:
@media only screen and (min-width:0) and (max-width:768px){

//CSS rules here

}

Small Desktop:
@media only screen and (min-width:0) and (max-width:992px){

//CSS rules here

}

Large Desktop:
@media only screen and (min-width:0) and (max-width:1200px){

//CSS rules here

}

HD Desktop
@media only screen and (min-width:0) and (max-width:1600px){

//CSS rules here

}




