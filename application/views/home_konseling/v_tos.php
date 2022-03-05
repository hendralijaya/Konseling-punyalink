<main id="verifikasi" class="section_form">
    <div class="container">
        <div class="form">
            <h1 class="agr">AGREEMENT</h1>
            <h1 class="tos">Term of Service</h1>
            <p class="list_tos">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis, lectus magna fringilla urna, porttitor rhoncus</p>

            <p class="list_tos">dolor purus non enim praesent elementum facilisis leo, vel fringilla est ullamcorper eget nulla facilisi etiam dignissim diam quis enim lobortis scelerisque fermentum dui faucibus in ornare quam viverra</p> 

           <ul class="list_tos" style="padding-inline-start:20px;">
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis, lectus magna</li> 
                <li>fringilla urna, porttitor rhoncus dolor purus non enim praesent elementum facilisis leo, vel</li>
                <li>rhoncus dolor purus non enim praesent elementum facilisis leo, vel fringilla est </li>
                <li>eget nulla facilisi etiam dignissim diam quis enim lobortis scelerisque fermentum dui faucibus in ornare quam viverra</li>
            </ul>
            <p class="list_tos"> ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis, lectus magna fringilla urna, porttitor rhoncus dolor purus non enim praesent elementum facilisis leo, vel fringilla est</p>

            <p class="list_tos">ullamcorper eget nulla facilisi etiam dignissim diam quis enim lobortis scelerisque fermentum dui faucibus in ornare quam viverra orci sagittis eu volutpat odio facilisis mauris sit amet massa vitae tortor condimentum lacinia quis vel eros donec ac odio.</p>
            <div style="margin-top: 24px;">
                <input type="checkbox" name="" id="agree1" onchange="checkedFunc('agree1', 'agree2')">
                <label class="list_tos" for="">I agree with the Term and Conditions</label>
            </div>
            <div style="margin-bottom: 24px;">
                <input type="checkbox" id="agree2" onchange="checkedFunc('agree1', 'agree2')"> 
                <label class="list_tos" for="">I agree with Fore &nbsp;<a href="#">Privacy Policy</a></label>
            </div>
            <form action="<?= site_url('KonselingController/storeTOS') ?>" method="POST">
                <input type="submit" name="tos" value="I agree with terms" disabled id="acceptbtn" />
            </form>
            <!-- <button type="submit" class="btn_next">Not right now..</button>
            <button type="submit" id="btn_agree" class="btn_next">I agree with terms</button> -->
        </div>
    </div>
</main>

<script>
    function checkedFunc(agree1, agree2) {
  
    var myLayer = document.getElementById('acceptbtn');
    var element1 = document.getElementById('agree1');
    var element2 = document.getElementById('agree2');
    if (element1.checked == true && element2.checked == true) {
        myLayer.class = "submit";
        myLayer.removeAttribute("disabled");
    } else {
        myLayer.class = "button:disabled";
        myLayer.setAttribute("disabled","disabled");
    };
    }
</script>