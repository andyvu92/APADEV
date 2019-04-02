CKEDITOR.addTemplates( 'default',
{
imagesPath: CKEDITOR_BASEPATH + '../../themes/evolve/ckeditor-content-template/images/' ,
templates :
    [
        {
            title: 'Inmotion Intro Text',
			image: 'template1.gif',
			description: 'Introduction text for Inmotion Articles.',
			html: '<div class="intro"><p>' +
				'Double_click_to_edit' +
				'</p></div>'
        },
        {
            title: 'Inmotion Left Image',
			image: 'template1.gif',
			description: 'Left image without sub text for Inmotion Articles.',
			html: '<div class="left-image">' +
				'<img src=" " alt="" height="100" width="100" />' +
				'</div>'
        },
        {
            title: 'Inmotion Left Image With Sub Text',
			image: 'template1.gif',
			description: 'Left image with sub text for Inmotion Articles.',
			html: '<div class="left-image">' +
                '<img src=" " alt="" height="100" width="100" />' +
                '</div>' +
                '<h6>Double_click_to_edit</h6>'
        },
        {
            title: 'Inmotion Right Image',
			image: 'template1.gif',
			description: 'Right image without sub text for Inmotion Articles.',
			html: '<div class="right-image">' +
				'<img src=" " alt="" height="100" width="100" />' +
				'</div>'
        },
        {
            title: 'Inmotion Right Image With Sub Text',
			image: 'template1.gif',
			description: 'Right image with sub text for Inmotion Articles.',
			html: '<div class="right-image">' +
                '<img src=" " alt="" height="100" width="100" />' +
                '</div>' +
                '<h6>Double_click_to_edit</h6>'
        },
        {
            title: 'Inmotion Center Image Full Width',
			image: 'template1.gif',
			description: 'Center full-width image without sub text for Inmotion Articles.',
			html: '<div class="center-image">' +
				'<img src=" " alt="" height="100" width="100" />' +
				'</div>'
        },
        {
            title: 'Inmotion Center Image Full Width With Sub Text',
			image: 'template1.gif',
			description: 'Center full-width image with sub text for Inmotion Articles.',
			html: '<div class="center-image">' +
				'<img src=" " alt="" height="100" width="100" />' +
                '</div>' + 
                '<h6>Double_click_to_edit</h6>'
        },
    ]
});