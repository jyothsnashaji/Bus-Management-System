function loadinput()
{
    var ele=document.getElementById('user_type');
    var val=ele.options[ele.selectedIndex].value;
    if (val=='driver')
        {
             document.getElementById('passenger').style.display='none';
            document.getElementById('driver').style.display='block';
        }
    else if (val=='staff' || val=='student')
        {
                       document.getElementById('driver').style.display='none';
 document.getElementById('passenger').style.display='block';
        }
    else{
        document.getElementById('passenger').style.display='none';
        document.getElementById('driver').style.display='none';
    }
}