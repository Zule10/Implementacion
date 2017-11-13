$(function(){

	var filemanager = $('.filemanager'),
		breadcrumbs = $('.breadcrumbs'),
		fileList = filemanager.find('.data');

	var breadcrumbsUrls	=[];
	var currentPath;

	buscarFolder('C:\\');

	function buscarFolder(nextDir){

        var dir = 'dir.php?nextDir='+nextDir; 

        $.get(dir,function(datos){

        	render(datos);

        });
	}


	function render(data){
    	
    	fileList.show();

    	addBreadcrumbs(data);

    	currentPath=data.path;

		if (!data.items.length) {

			filemanager.find('.nothingfound').show();

		}else{

			filemanager.find('.nothingfound').hide();

			$.each(data['items'], function (key, info){

		var folder = $('<li class="folders"><a href="'+ info['path'] +'" title="'+ info['path'] +'" class="folders">'+'<span class="icon folder full"></span>'+'<span class="name">' + info['name'] + '</a></li>');
			folder.appendTo(fileList);

			});
		}		
		
	}

	function addBreadcrumbs(data){
		
		breadcrumbsUrls.push(data.path);

		window.location.hash = encodeURIComponent(data.path);

		var url = '';

			fileList.addClass('animated');

			breadcrumbsUrls.forEach(function (u, i) {

				var name = u.split('/');

				if (i !== breadcrumbsUrls.length - 1) {
					url += '<a href="'+u+'"><span class="folderName">' + name[name.length-1] + '</span></a> <span class="arrow">→</span> ';
				}
				else {
					url += '<span class="folderName">' + name[name.length-1] + '</span>';
				}

			});

		breadcrumbs.text('').append(url);
		fileList.animate({'display':'inline-block'});
	}		
	
	fileList.on('click', 'li.folders', function(e){

		e.preventDefault(); 

		fileList.empty().hide();

		var nextDir = $(this).find('a.folders').attr('href');

		buscarFolder(nextDir);

      });



	breadcrumbs.on('click', 'a', function(e){

		e.preventDefault();

		var index = breadcrumbs.find('a').index($(this)),
			nextDir = breadcrumbsUrls[index];

		breadcrumbsUrls.length = Number(index);

		window.location.hash = encodeURIComponent(nextDir);

		fileList.empty().hide();

        buscarFolder(nextDir);

	});

	$("input" ).click(function() {
		document.getElementById('lab').value=currentPath;
 		return currentPath;
	});
	
});


