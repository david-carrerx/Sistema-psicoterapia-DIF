//Función para hacer que la primera letra del nombre de usuario sea mayúscula.
function capitalizeWords(input)
{
    var value = input.value;
    if (value.length > 0)
    {
        var words = value.split(' ');
        for (var i = 0; i < words.length; i++)
        {
            words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1);
        }
        input.value = words.join(' ');
    }
}