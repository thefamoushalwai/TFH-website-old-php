$.fn.extend({
    multiPick: function (config) {
        var settings = $.extend({
            limit: 2,
            image: false,
            closeAfterSelect: true,
            search: false,
            placeholder: 'Select',
            slim: false
        }, config);

        // Your existing plugin code...

        $(this).parent().prepend(`
            <div class="mutiple-select ${slim}" id="${id}" data-settings="${stringSetting}">
                <div class="main-content">
                    <span>${settings.placeholder}</span>
                    <div class="selected-itens">                          
                    </div>
                    <!-- Add a custom button for toggling the dropdown -->
                    <button class="toggle-button">&#9660;</button>
                </div>
                <div class="itens-list" style="display: none;">
                    ${search}
                    ${itemFormat}
                </div>
            </div>`);

        // Existing plugin code...
        $('.toggle-button').on('click', function (e) {
            e.stopPropagation();
            $(`.mutiple-select:not(#${id}) .itens-list`).slideUp('fast');
            $(`#${id}`).find(`.itens-list`).slideToggle('fast');
        });

        // Existing plugin code...
    },

    // Your existing methods...

    updateMultiPick: function () {
        let id = $(this).prop('id');
        let options = $(`#${id} option`);
        let itens = $.map(options, function (option) {
            return option;
        });

        $(`#${id} option`).remove();

        let itemFormat = ``;
        let settings = JSON.parse($(this).data('settings').replaceAll(`'`, `"`));

        $.each(itens, function (i, v) {
            if (settings.image === true) {
                itemFormat += `<div class="option-item" data-value="${$(v).val()}" id="${$(v).text()}">        
                                    <div class="image" style="background-image: url(${ $(v).data('img')})" data-image="${ $(v).data('img')}"></div>
                                    <div class="item-content">
                                        <span class="item-heading">${$(v).text()}</span>
                                        <span class="badge-icon">Badge</span>
                                        <span class="green-line-text">Green Line Text</span>
                                        <span class="last-badge">Last Badge</span>
                                    </div>
                                </div>`;
            } else {
                // Adjust this part based on your needs
                itemFormat += `<div class="option-item" data-value="${$(v).val()}" id="${$(v).text()}">
                                    <div class="item-content">
                                        <span class="item-heading">${$(v).text()}</span>
                                        <span class="badge-icon">Badge</span>
                                        <span class="green-line-text">Green Line Text</span>
                                        <span class="last-badge">Last Badge</span>
                                    </div>
                                </div>`;
            }
        });

        $(this).find('.itens-list').append(itemFormat);
    }
});
