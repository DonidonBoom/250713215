
function fn_ValFrom() {
    var sMsg = "";

        if (document.getElementById("Nama").value == "") {
            sMsg += "\n* anda belum mengisikan nama";
        }
        

        if (document.getElementById("Email").value == "" || !document.getElementById("Email").value.match(/^[a-z0-9][a-z0-9_\.-]{0,}[a-z0-9]@[a-z0-9][a-z0-9_\.-]{0,}[a-z0-9][\.][a-z0-9]{2,4}$/)) {
            sMsg += "\n* anda belum mengisikan email dengan benar";
        }

        if (document.getElementById("Umur").value == "") {
            sMsg += "\n* anda belum mengisikan umur";
        }else if(isNaN(umur)){
            sMsg += "\n* umur harus berupa angka";
        }else{
            var umur = parseInt(document.getElementById("Umur").value);
            if(umur >= 10 && umur <= 18){
                if(umur <= 14){
                    var info = "Kategori Junior";
                }else{
                    var info = "Kategori Senior";
                }
            }
        }

        if(document.getElementById("kategori").value == "") {
            sMsg += "\n* anda belum mengisikan pilihan lomba";
        }else{
            var pilihan = document.getElementById("kategori").value;
            switch(pilihan){
                case "C" :
                    pilihan = "Cerdas Cermat";
                    break;
                case "P":
                    pilihan = "Puisi";
                    break;
                case "D" :
                    pilihan = "Design Poster";
                    break;
            }
        }

        if (sMsg != "") {
            alert("Peringatan: \n" + sMsg);
            return false;
        }

        alert("Terima kasih [" + Nama + "]! anda terdaftar di lomba [" + pilihan + "] [" + info + "]");
        return true;

}

