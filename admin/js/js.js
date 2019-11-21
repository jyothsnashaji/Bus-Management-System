function getBusid(purpose)
{
   var ele=document.getElementById('busid_modal');
   ele.style.display='block';
   document.getElementById('getbusid').action=purpose;

}

function addStop()
{
    var ele=document.getElementById('stopsInput');
    var html=`
<div class='row justify-content-center'>
    <div class='col-sm-3'> 
        <input type='text' name='stop[]' required>
    </div>
    <div class='col-sm-3'> 
        <input type='time' name='totime[]' required>
    </div>
    <div class='col-sm-3'> 
        <input type='time' name='fromtime[]' required>
    </div>
   
</div> `;
    ele.innerHTML+=html;
}

function displaydb()
{
    var ele=document.getElementById('for');

    var val=ele.options[ele.selectedIndex].value;
  
    document.getElementById('student').style.display='none';
    document.getElementById('driver').style.display='none';
    document.getElementById('staff').style.display='none';

    document.getElementById(val).style.display='block';

}

function toggle_collapse(op)
          {
               var ele=document.getElementById("collapse"+op);
         
              if (ele.classList.contains('show'))
                  {
                    
                      ele.classList.remove('show');
                  }
            else
                {
                    ele.classList.add('show');
                   
                }

		  }
