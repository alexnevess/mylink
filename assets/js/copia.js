function btnCopiar() {
    const link = document.getElementById("resultado").value;
    navigator.clipboard.writeText(link);

    alert('URL copiada!');
}