 function validateContactForm() {
            var valid = true;
            var userName = $("#unamess").val();
            var userEmail = $("#uemailss").val();
            var content = $("#udesignat").val();
            var salary = $("#usalarys").val();
            var date = $("#datess").val();
            
            if (userName == ""){
               $(".clsdfgdff").addClass("borderscls");
                valid = false;
            }else{
                $(".clsdfgdff").removeClass("borderscls");
            }
            if (userEmail == "") {
                $(".gfhbgnhgff").addClass("borderscls");
                valid = false;
            }else{
                $(".gfhbgnhgff").removeClass("borderscls");
            }
            if (!userEmail.match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/))
            {
                $(".gfhbgnhgff").addClass("borderscls");
                valid = false;
            }
            if (content == "") {
                $(".bghfdsdfhf").addClass("borderscls");
                valid = false;
            }else{
                $(".bghfdsdfhf").removeClass("borderscls");
            }
            if (salary == "") {
                $(".dvbnvcddgd").addClass("borderscls");
                valid = false;
            }else{
                $(".dvbnvcddgd").removeClass("borderscls");
            }
            if (date == "") {
                $(".gdfdrdsdsfgd").addClass("borderscls");
                valid = false;
            }else{
                $(".gdfdrdsdsfgd").removeClass("borderscls");
            }
            return valid;
        }