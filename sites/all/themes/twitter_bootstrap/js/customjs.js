(function($) {
	$(document).ready(function() {
		$(".form-radio").click(function() {	
			$("input.form-radio").parent().removeClass('choosen');
			if ($(this).is(':checked')) {
				$(this).parent().addClass('choosen');
			}
		});

        $('.page-user-register .field-name-field-role input.form-radio:checked').parent().addClass('choosen');



		$(".form-item-field-job-type-und input.form-radio").click(function() {	
			$(".form-item-field-job-type-und input.form-radio").parent().removeClass('active');
			if ($(this).is(':checked')) {
				$(this).parent().addClass('active');
			}
		});
        // Get Selected Job Type
        $('.form-item-field-job-type-und input.form-radio[checked="checked"]').parent().addClass('active');
		
        // Temp / Close button
        $('.close').click(function() {
            $(this).parent().remove();
        });
        // Job Creation / *Bad Solution /
        $(".page-node-add-job input#edit-field-job-type-und-0, .node-type-job input#edit-field-job-type-und-0").parent().addClass('cass_job-type-blog');
        $(".page-node-add-job input#edit-field-job-type-und-1, .node-type-job input#edit-field-job-type-und-1").parent().addClass('cass_job-type-article');
        $(".page-node-add-job input#edit-field-job-type-und-2, .node-type-job input#edit-field-job-type-und-2").parent().addClass('cass_job-type-facebook');
        $(".page-node-add-job input#edit-field-job-type-und-3, .node-type-job input#edit-field-job-type-und-3").parent().addClass('cass_job-type-twitter');

        /*$(".page-node-add-job input").click(function() {
            $(".page-node-add-job input").parent().removeClass('active');
            if ($(this).is(':checked')) {
                $(this).parent().addClass('active');
            }
        });*/

       //Menu Login
        /*
        var $userLink = $('header ul.cassowary-user-dashboard li.user-dashboard');
        var $dropMenu = $('header ul.cassowary-user-dashboard li.user-dashboard ul');

        $userLink.click(function() {
            $(this).parent().toggleClass('active').find('ul').toggle();
            var currentWidth = $(this).width();
            $dropMenu.width(currentWidth + 8);
            return false
        });*/

        // Search Drop Down Menu
        var $SearchTypeButton = $('#cassowary-search-form .form-type-radios > label');
        var $SearchTypeMenu = $('div.cassowary-list-options');
        $SearchTypeButton.click(function() {
            $(this).next().find($SearchTypeMenu).toggle();
            return false
        });

        //Check Search Type Function
        function checkSearchType() {
            var $SearchType = $('div.cassowary-list-options input:checked').parent().text();
            $SearchTypeButton.text($SearchType);
        }
        checkSearchType();
        $('div.cassowary-list-options label').click(function() {
            if ($(this).find('input:checked')) {
                checkSearchType();
            }
        });

        var $addMenuPostsList = $('.pane-cassowary-main-cassowary-writer-add ul.cassowary-writer-add > li.writer-add-main > div.item-list');
        var $addMenuPostsListEmpty = $('.view-empty ul.cassowary-writer-add > li.writer-add-main > div.item-list');

        // Add Post Button on Portfolio Header
        $('.pane-cassowary-main-cassowary-writer-add ul.cassowary-writer-add > li.writer-add-main > a').click(function() {
            $(this).next('div.item-list').toggle();
            return false
        });
        // Add Post Button on Portfolio EMPTY!
        $('.view-empty ul.cassowary-writer-add > li.writer-add-main > a').click(function() {
            $(this).next('div.item-list').toggle();
            return false
        });

        //Body Click
        $('body').click(function() {
            //$SearchTypeMenu.hide();
            $addMenuPostsList.hide();
            $addMenuPostsListEmpty.hide();
            $('#edit-method').hide();
        });
        $($addMenuPostsList).click(function(event){
            event.stopPropagation();
        });

        // Block Height
        var hhh2 = 0;
        $('.page-billing-plans .view-billing-plans .views-row').each(function(i, e) {
            var sh2 = $(this).height();
            if (sh2 > hhh2) hhh2 = sh2;
        }).height(hhh2);

        //AVATAR UPLOADER, IMAGE UPLOADER
        function styledImageInput() {
            $('.page-user-portfolio-edit .field-name-field-avatar input[type="file"]').each(function () {
                $(this).attr('size', '1').wrap('<div class="styledImageLabel"></div>').addClass('styledImageInput');
            });
        }
        styledImageInput();

        // Check Facebook Post Function
        $('#edit-post-image input:checked').parent().addClass('choosen');
        $('#edit-post-image label.radio').click(function() {
            checkFacebookPost();
        });
        checkFacebookPost();
        function checkFacebookPost() {
            var $fbImageArea = $('#edit-field-fb-image');
            if ($('#edit-post-image-1').parent().hasClass('choosen')) {
                $fbImageArea.show();
            } else {
                $fbImageArea.hide();
            }
        }
        $('#edit-post-image-0').parent().addClass('fbpost');
        $('#edit-post-image-1').parent().addClass('fbimage');

        /*function setMessageHeight() {
            var messageRightBarHeight = $('.page-messages-private .search-messages-rigth').outerHeight();
            $('.page-messages-private .search-messages-left').height(messageRightBarHeight - 16);
        }
        setMessageHeight();*/
    });
})(jQuery);