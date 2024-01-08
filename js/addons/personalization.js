$(document).ready(function() {

    var selectedElement = null;

    // Función para añadir texto
    $('#addText').click(function() {
        var texto = prompt("Ingrese el texto:");
        if (texto) {
            var div = $('<div class="draggable" style="position: absolute;">' + texto + '</div>');
            $('#areaDeEdicion').append(div);
            makeDraggable(div);
        }
    });

    // Función para añadir enlaces
    $('#addLink').click(function() {
        var url = prompt("Ingrese la URL del enlace:");
        var texto = prompt("Ingrese el texto del enlace:");
        if (url && texto) {
            var a = $('<a href="' + url + '" class="draggable" style="position: absolute;">' + texto + '</a>');
            $('#areaDeEdicion').append(a);
            makeDraggable(a);
        }
    });

    // Función para añadir imágenes
    $('#imageInput').change(function(e) {
        var file = e.target.files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
            var img = $('<img src="' + e.target.result + '" class="draggable" style="position: absolute;">');
            $('#areaDeEdicion').append(img);
            makeDraggable(img);
        };
        reader.readAsDataURL(file);
    });

    // Función para cambiar el tamaño de las imágenes
    var selectedImage = null;
    $('#areaDeEdicion').on('click', 'img', function() {
        selectedImage = $(this);
        $('#imageSizeSlider').show().val($(this).width());
    });

    $('#imageSizeSlider').on('input change', function() {
        if (selectedImage) {
            selectedImage.width($(this).val());
        }
    });

    // Función para hacer los elementos arrastrables
    function makeDraggable(element) {
        element.draggable({
            containment: 'parent'
        });
    }

    // Iniciar con orientación horizontal
    $('#areaDeEdicion').css({
        'width': '700px',
        'height': '500px'
    });

    
    // Función para modificar la orientación del plano editable
    $('#orientacionVertical').click(function() {
        $('#areaDeEdicion').css({
            'width': '500px',
            'height': '700px'
        });
    });

    $('#orientacionHorizontal').click(function() {
        $('#areaDeEdicion').css({
            'width': '700px',
            'height': '500px'
        });
    });

    //Función para seleccionar elementos con un clic
    $('#areaDeEdicion').on('click', '.draggable', function(e) {
        $('.draggable').removeClass('selected');
        selectedElement = $(this);
        selectedElement.addClass('selected');

        if (selectedElement.is("div")) {
            $('#fontFamily').val(selectedElement.css('font-family').replace(/['"]+/g, ''));
            $('#fontSize').val(parseInt(selectedElement.css('font-size')));
        }

        e.stopPropagation();
    });

    // Función para aplicar el estilo seleccionado
    $('#applyTextStyle').click(function() {
        if (selectedElement && selectedElement.is("div")) {
            selectedElement.css({
                'font-family': $('#fontFamily').val(),
                'font-size': $('#fontSize').val() + 'px'
            });
        }
    });
    
    // Función para deseleccionar elementos al hacer clic en otro lugar
    $(document).click(function(e) {
        if (!$(e.target).is('.draggable') && !$(e.target).closest('#areaDeEdicion').length) {
            selectedText = null;
            selectedImage = null;
            $('#imageSizeSlider').hide();
        }
    });

    // Función para eliminar un elemento seleccionado
    $('#eliminarElemento').click(function() {
        if (selectedElement) {
            selectedElement.remove();
            selectedElement = null;
        }
    });

    
    // Función para exportar a PDF y como imagen
    $('#exportarAPdf').click(function() {
        var areaEdicion = document.getElementById('areaDeEdicion');
        var width = areaEdicion.offsetWidth;
        var height = areaEdicion.offsetHeight;

        html2canvas(areaEdicion, {
            width: width,
            height: height
        }).then(canvas => {
            // Exportar como PDF
            const imgData = canvas.toDataURL('image/png');
            const pdf = new jspdf.jsPDF({
                orientation: width > height ? 'landscape' : 'portrait',
                unit: 'px',
                format: [width, height]
            });
            pdf.addImage(imgData, 'PNG', 0, 0, width, height);
            pdf.save("Invitacion.pdf");

            // Exportar como imagen (PNG)
            var imgURL = canvas.toDataURL('image/png');
            var dlLink = document.createElement('a');
            dlLink.download = 'Invitacion.png';
            dlLink.href = imgURL;
            dlLink.dataset.downloadurl = ['image/png', dlLink.download, dlLink.href].join(':');
            
            document.body.appendChild(dlLink);
            dlLink.click();
            document.body.removeChild(dlLink);
        });
    });
    
    
});
