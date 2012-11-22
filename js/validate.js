function validateAnswers()
{
	for (var i=1; i<=5; i++)
	{	
		var x=document.getElementsByName("a" + i);
		var isChecked = false;
		for ( var j = 0; j < x.length; j++)
		{
			if(x[j].checked)
			{
				isChecked = true;
			}
		}
		if(!isChecked)
		{
			alert("Please enter an answer for question " + i + ".");
			return false;
		}
	}
}
