function validate_mprice(bidprice,control)
{
	bidprice=Math.round(bidprice);

	var myvalue=document.getElementById(control).value;
	myvalue=Math.round(myvalue);
	if(myvalue>bidprice)
	{
		document.getElementById("merrormsg").style.display="block";
		document.getElementById("merrormsg").innerHTML="Error, Bid price can't be greater then proposed bid budget.";
		return false;
	}

}