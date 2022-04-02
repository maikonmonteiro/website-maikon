<?php
//diretório para salvar as imagens
$diretorio = "uploads/";
//Verificar a existência do diretório para salvar as imagens e informa se o caminho é um diretório
if(!is_dir($diretorio)){ 
    echo "Pasta $diretorio nao existe";
}else{    
    $arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;
    //loop para ler as imagens
    for ($controle = 0; $controle < count($arquivo['name']); $controle++){        
        $destino = $diretorio."/".$arquivo['name'][$controle];
        //realizar o upload da imagem em php
        //move_uploaded_file — Move um arquivo enviado para uma nova localização
        if(move_uploaded_file($arquivo['tmp_name'][$controle], $destino)){
           echo "<meta http-equiv='refresh' content='0; URL=index.php'>
		<script type=\"text/javascript\">
		alert(\"Arquivos enviados com sucesso!\");
		</script>";
        }else{
            echo "<meta http-equiv='refresh' content='0; URL=index.php'>
		<script type=\"text/javascript\">
		alert(\"Erro ao enviar os arquivos!\");
		</script>";
        }        
    }
}
?>