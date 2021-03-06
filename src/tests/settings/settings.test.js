import Settings from '../../js/settings/settings.js';

function getTables() {
	return `
<form id="ctl-options" action="http://test.test/wp-admin/options.php" method="post">
    <h2>ISO9 Table</h2>
    <table class="form-table">
        <tbody>
        <tr>
            <th scope="row">ISO9 Table</th>
            <td>
                <div class="ctl-table-cell">
                    <label for="iso9-0">А</label>
                    <input name="cyr_to_lat_settings[iso9][А]" id="iso9-0" type="text" placeholder="" value="A" class="regular-text">
                </div>
                <div class="ctl-table-cell">
                    <label for="iso9-1">Б</label>
                    <input name="cyr_to_lat_settings[iso9][Б]" id="iso9-1" type="text" placeholder="" value="B" class="regular-text">
                </div>
            </td>
        </tr>
        </tbody>
    </table>
    <h2>bel Table</h2>
    <div id="ctl-current"></div>
    <table class="form-table">
        <tbody>
        <tr>
            <th scope="row">bel Table</th>
            <td>
                <div class="ctl-table-cell">
                    <label for="bel-0">А</label>
                    <input name="cyr_to_lat_settings[bel][А]" id="bel-0" type="text" placeholder="" value="A" class="regular-text">
                </div>
                <div class="ctl-table-cell">
                    <label for="bel-1">Б</label>
                    <input name="cyr_to_lat_settings[bel][Б]" id="bel-1" type="text" placeholder="" value="B" class="regular-text">
                </div>
            </td>
        </tr>
        </tbody>
    </table>
    <h2>uk Table</h2>
    <table class="form-table">
        <tbody>
        <tr>
            <th scope="row">uk Table</th>
            <td>
                <div class="ctl-table-cell">
                    <label for="uk-0">А</label>
                    <input name="cyr_to_lat_settings[uk][А]" id="uk-0" type="text" placeholder="" value="A" class="regular-text">
                </div>
                <div class="ctl-table-cell">
                    <label for="uk-1">Б</label>
                    <input name="cyr_to_lat_settings[uk][Б]" id="uk-1" type="text" placeholder="" value="B" class="regular-text">
                </div>
            </td>
        </tr>
        </tbody>
    </table>
    <input type="hidden" name="option_page" value="cyr_to_lat_group">
    <input type="hidden" name="action" value="update">
    <input type="hidden" id="_wpnonce" name="_wpnonce" value="831b4c5b80">
    <input type="hidden" name="_wp_http_referer" value="/wp-admin/options-general.php?page=cyr-to-lat">
    <p class="submit">
        <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
    </p>
</form>
`.replace( /\n/g, '' ).replace( />\s+</g, '><' ).trim();
}

function getActiveForm() {
	return `
<form action="http://test.test/wp-admin/options.php" method="post">
    <table class="form-table ctl-table active">
        <tbody>
        <tr>
            <th scope="row">bel Table</th>
            <td>
                <div class="ctl-table-cell">
                    <label for="bel-0">А</label>
                    <input name="cyr_to_lat_settings[bel][А]" id="bel-0" type="text" placeholder="" value="A1" class="regular-text">
                </div>
                <div class="ctl-table-cell">
                    <label for="bel-1">Б</label>
                    <input name="cyr_to_lat_settings[bel][Б]" id="bel-1" type="text" placeholder="" value="B" class="regular-text">
                </div>
            </td>
        </tr>
        </tbody>
    </table>
    <input type="hidden" name="option_page" value="cyr_to_lat_group">
    <input type="hidden" name="action" value="update">
    <input type="hidden" id="_wpnonce" name="_wpnonce" value="831b4c5b80">
    <input type="hidden" name="_wp_http_referer" value="/wp-admin/options-general.php?page=cyr-to-lat">
</form>
`.replace( /\n/g, '' ).replace( />\s+</g, '><' ).trim();
}

beforeEach(
	() => {
		fetch.resetMocks();
		global.fetch.mockClear();
	}
);

describe( 'Settings', () => {
		test( 'Add wrapper', () => {
				document.body.innerHTML = getTables();

				new Settings();

				const wrapper = document.querySelector( '#ctl-options ul.nav-tab-wrapper' );
				expect( typeof wrapper ).not.toBe( undefined );
			}
		);

		test( 'Add message lines', () => {
				document.body.innerHTML = getTables();

				new Settings();

				const successMessage = document.querySelector( '#ctl-options #ctl-success' );
				expect( typeof successMessage ).not.toBe( undefined );

				const errorMessage = document.querySelector( '#ctl-options #ctl-error' );
				expect( typeof errorMessage ).not.toBe( undefined );
			}
		);

		test( 'Hide tables', () => {
				document.body.innerHTML = getTables();

				new Settings();

				const tables = [...document.querySelectorAll( '#ctl-options table' )];
				tables.map(
					( table, index ) => {
						expect( table.classList.contains( 'ctl-table' ) ).toBe( true );
						if ( 1 === index ) {
							expect( table.classList.contains( 'active' ) ).toBe( true );
						}
					}
				);
				const tabs = [...document.querySelector( '#ctl-options ul.nav-tab-wrapper' )];
				expect( typeof tabs ).not.toBe( undefined );

				const headers = [...document.querySelectorAll( '#ctl-options ul.nav-tab-wrapper h2' )];
				headers.map(
					( header, index ) => {
						expect( header.classList.contains( 'nav-tab' ) ).toBe( true );
						expect( parseInt( header.dataset.index ) ).toBe( index );
						if ( 1 === index ) {
							expect( header.classList.contains( 'nav-tab-active' ) ).toBe( true );
						}
					}
				);
			}
		);

		test( 'Click headers', () => {
				document.body.innerHTML = getTables();

				const settings = new Settings();

				const headers = [...document.querySelectorAll( '#ctl-options ul h2' )];

				const checkActive = ( i ) => {
					headers.map(
						( header, index ) => {
							if ( i === index ) {
								expect( header.classList.contains( 'nav-tab-active' ) ).toBe( true );
							} else {
								expect( header.classList.contains( 'nav-tab-active' ) ).toBe( false );
							}
						}
					);

					const tables = [...document.querySelectorAll( '.ctl-table' )];
					tables.map(
						( table, index ) => {
							if ( i === index ) {
								expect( table.classList.contains( 'active' ) ).toBe( true );
							} else {
								expect( table.classList.contains( 'active' ) ).toBe( false );
							}
						}
					);
				};

				const spySaveActiveTable = jest.spyOn( settings, 'saveActiveTable' );

				checkActive( 1 );

				headers[0].click();
				checkActive( 0 );

				headers[2].click();
				checkActive( 2 );

				headers[1].click();
				checkActive( 1 );

				// Click on active header to assure that nothing happens.
				headers[1].click();
				checkActive( 1 );

				expect( spySaveActiveTable ).toHaveBeenCalledTimes( 3 );
			}
		);

		test( 'Click submit', () => {
				document.body.innerHTML  = getTables();
				const settings           = new Settings();
				const submit             = document.querySelector( '#ctl-options #submit' );
				const spySaveActiveTable = jest.spyOn( settings, 'saveActiveTable' );

				const event = new Event( 'click' );
				submit.dispatchEvent( event );

				expect( spySaveActiveTable ).toHaveBeenCalledTimes( 1 );
			}
		);

		test( 'Show message', () => {
				document.body.innerHTML = getTables();
				const settings          = new Settings();
				const successMessage    = document.querySelector( '#ctl-options #ctl-success' );
				const errorMessage      = document.querySelector( '#ctl-options #ctl-error' );

				jest.useFakeTimers();

				expect( successMessage.innerHTML ).toBe( '' );
				expect( successMessage.classList.contains( 'active' ) ).toBe( false );

				expect( errorMessage.innerHTML ).toBe( '' );
				expect( errorMessage.classList.contains( 'active' ) ).toBe( false );

				settings.showMessage( settings.successMessage, 'Success.' );
				expect( successMessage.innerHTML ).toBe( 'Success.' );
				expect( successMessage.classList.contains( 'active' ) ).toBe( true );

				settings.showMessage( settings.errorMessage, 'Error.' );
				expect( errorMessage.innerHTML ).toBe( 'Error.' );
				expect( errorMessage.classList.contains( 'active' ) ).toBe( true );

				expect( setTimeout ).toHaveBeenCalledTimes( 2 );
				expect( setTimeout ).toHaveBeenCalledWith( expect.any( Function ), 5000 );

				jest.runAllTimers();

				expect( successMessage.innerHTML ).toBe( '' );
				expect( errorMessage.innerHTML ).toBe( '' );

				expect( clearTimeout ).toHaveBeenCalledTimes( 1 );
				expect( clearTimeout ).toHaveBeenCalledWith( settings.msgTimer );
			}
		);

		test( 'Set submit status', () => {
				document.body.innerHTML = getTables();

				new Settings();

				const submitButton = document.querySelector( '#ctl-options #submit' );
				expect( typeof submitButton ).not.toBe( undefined );
				expect( submitButton.disabled ).toBe( true );

				const input = document.querySelector( '#ctl-options table.active input' );
				input.value = 'A1';

				const event = new Event( 'input' );
				input.dispatchEvent( event );

				expect( submitButton.disabled ).toBe( false );
			}
		);

		test( 'Do not save active table when not modified', () => {
				document.body.innerHTML = getTables();
				const settings          = new Settings();
				const fetch             = jest.spyOn( global, 'fetch' );

				settings.saveActiveTable();

				expect( fetch ).not.toHaveBeenCalled();
			}
		);

		test( 'Save active table', () => {
				document.body.innerHTML = getTables();

				const settings            = new Settings();

				const successMessage    = document.querySelector( '#ctl-options #ctl-success' );
				const errorMessage      = document.querySelector( '#ctl-options #ctl-error' );

				const mockSuccessResponse = {};
				const mockJsonPromise     = Promise.resolve( mockSuccessResponse );
				const mockFetchPromise    = Promise.resolve(
					{
						ok: true,
						json: () => mockJsonPromise
					}
				);

				const fetch = jest.spyOn( global, 'fetch' ).mockImplementation( () => mockFetchPromise );

				const template     = document.createElement( 'template' );
				template.innerHTML = getActiveForm();
				const activeForm   = template.content.firstChild;
				document.body.appendChild( activeForm );

				const action = 'http://test.test/wp-admin/options.php';
				const init   = {
					method: 'post',
					body: new URLSearchParams( [...new FormData( activeForm )] ),
				};

				const input = document.querySelector( '#ctl-options table.active input' );
				input.value = 'A1';

				const event = new Event( 'input' );
				input.dispatchEvent( event );

				settings.saveActiveTable().finally(
					() => {
						expect( settings.isActiveTableChanged() ).toBe( false );

						expect( successMessage.innerHTML ).toBe( 'Options saved.' );
						expect( successMessage.classList.contains( 'active' ) ).toBe( true );

						expect( errorMessage.innerHTML ).toBe( '' );
						expect( errorMessage.classList.contains( 'active' ) ).not.toBe( true );
					}
				);

				expect( fetch ).toHaveBeenCalledTimes( 1 );
				expect( fetch ).toHaveBeenCalledWith( action, init );
			}
		);

		test( 'Save active table with error', () => {
				document.body.innerHTML = getTables();

				const settings            = new Settings();

				const successMessage    = document.querySelector( '#ctl-options #ctl-success' );
				const errorMessage      = document.querySelector( '#ctl-options #ctl-error' );

				const mockSuccessResponse = {};
				const mockJsonPromise     = Promise.resolve( mockSuccessResponse );
				const mockFetchPromise    = Promise.resolve(
					{
						ok: false,
						json: () => mockJsonPromise
					}
				);

				const fetch = jest.spyOn( global, 'fetch' ).mockImplementation( () => mockFetchPromise );

				const template     = document.createElement( 'template' );
				template.innerHTML = getActiveForm();
				const activeForm   = template.content.firstChild;
				document.body.appendChild( activeForm );

				const action = 'http://test.test/wp-admin/options.php';
				const init   = {
					method: 'post',
					body: new URLSearchParams( [...new FormData( activeForm )] ),
				};

				const input = document.querySelector( '#ctl-options table.active input' );
				input.value = 'A1';

				const event = new Event( 'input' );
				input.dispatchEvent( event );

				settings.saveActiveTable().finally(
					() => {
						expect( settings.isActiveTableChanged() ).toBe( true );

						expect( successMessage.innerHTML ).toBe( '' );
						expect( successMessage.classList.contains( 'active' ) ).not.toBe( true );

						expect( errorMessage.innerHTML ).toBe( 'Error saving options.' );
						expect( errorMessage.classList.contains( 'active' ) ).toBe( true );
					}
				);

				expect( fetch ).toHaveBeenCalledTimes( 1 );
				expect( fetch ).toHaveBeenCalledWith( action, init );
			}
		);

		test( 'Edit label', () => {
				document.body.innerHTML = getTables();

				new Settings();

				const labels = [...document.querySelectorAll( '#ctl-options #ctl-current+table label' )];
				const label = labels[0];
				label.click();

				const editLabelInput = label.parentNode.querySelector( '#ctl-edit-label' );

				expect( typeof editLabelInput ).not.toBe( undefined );
				expect( editLabelInput.value ).toBe( label.innerHTML );
				expect( editLabelInput.classList.contains( 'ctl-edit-label-error' ) ).toBe( false );
				expect( editLabelInput.style.display ).toBe( 'block' );
				expect( document.activeElement === editLabelInput ).toBe( true );
			}
		);

		test( 'Add label', () => {
				document.body.innerHTML = getTables();

				const settings = new Settings();

				const spyeditLabel = jest.spyOn( settings, 'editLabel' );
				const spybindEvents = jest.spyOn( settings, 'bindEvents' );

				const labels = [...document.querySelectorAll( '#ctl-options #ctl-current+table label' )];
				const plus = document.querySelector( '#ctl-options #ctl-current+table .ctl-plus' );
				plus.click();

				const lastCell = document.querySelector( '#ctl-options .active .ctl-plus' ).previousElementSibling;

				expect( typeof lastCell ).not.toBe( undefined );
				expect( lastCell.querySelector( 'label' ).htmlFor ).toBe( 'bel-' + parseInt( labels.length ) );
				expect( lastCell.querySelector( 'label' ).innerHTML ).toBe( '' );
				expect( lastCell.querySelector( 'input' ).id ).toBe( 'bel-' + parseInt( labels.length ) );
				expect( lastCell.querySelector( 'input' ).value ).toBe( '' );

				expect( spybindEvents ).toHaveBeenCalledTimes( 1 );
				expect( spybindEvents ).toHaveBeenCalledWith();

				expect( spyeditLabel ).toHaveBeenCalledTimes( 1 );
				expect( spyeditLabel ).toHaveBeenCalledWith( lastCell.querySelector( 'label' ) );
			}
		);

		test( 'Hide edit label input', () => {
				document.body.innerHTML = getTables();

				const settings = new Settings();

				const labels = [...document.querySelectorAll( '#ctl-options #ctl-current+table label' )];
				const label = labels[0];
				label.click();

				settings.hideEditLabelInput();

				const editLabelInput = document.querySelector( 'body > #ctl-edit-label' );

				expect( typeof editLabelInput ).not.toBe( undefined );
				expect( editLabelInput.classList.contains( 'ctl-edit-label-error' ) ).toBe( false );
				expect( editLabelInput.style.display ).toBe( 'none' );
			}
		);

		test( 'Do NOT save label when editLabelInput is hidden', () => {
				document.body.innerHTML = getTables();

				const settings = new Settings();

				settings.saveLabel();
			}
		);

		test( 'Do NOT save label when editLabelInput is empty', () => {
				document.body.innerHTML = getTables();

				const settings              = new Settings();
				const spyHideEditLabelInput = jest.spyOn( settings, 'hideEditLabelInput' );
				const spySetSubmitStatus    = jest.spyOn( settings, 'setSubmitStatus' );

				let labels = [...document.querySelectorAll( '#ctl-options #ctl-current+table label' )];
				const label  = labels[0];
				label.click();

				const editLabelInput = document.getElementById( 'ctl-edit-label' );
				const editedCell = editLabelInput.parentElement;

				editLabelInput.value = '';

				settings.saveLabel();

				labels = [...document.querySelectorAll( '#ctl-options #ctl-current+table label' )];

				expect( labels.length ).toBe( 1 );
				expect( spyHideEditLabelInput ).toHaveBeenCalledTimes( 1 );
				expect( spyHideEditLabelInput ).toHaveBeenCalledWith();
				expect( spySetSubmitStatus ).toHaveBeenCalledTimes( 1 );
				expect( spySetSubmitStatus ).toHaveBeenCalledWith();
			}
		);

		test( 'Do NOT save label when cancelled', () => {
				document.body.innerHTML = getTables();

				const settings              = new Settings();
				const spyHideEditLabelInput = jest.spyOn( settings, 'hideEditLabelInput' );

				let labels = [...document.querySelectorAll( '#ctl-options #ctl-current+table label' )];
				const label  = labels[0];
				label.click();

				settings.saveLabel( true );

				labels = [...document.querySelectorAll( '#ctl-options #ctl-current+table label' )];

				expect( labels.length ).toBe( 2 );
				expect( spyHideEditLabelInput ).toHaveBeenCalledTimes( 1 );
				expect( spyHideEditLabelInput ).toHaveBeenCalledWith();
			}
		);

		test( 'Do NOT save label when label not changed', () => {
				document.body.innerHTML = getTables();

				const settings              = new Settings();
				const spyHideEditLabelInput = jest.spyOn( settings, 'hideEditLabelInput' );

				let labels = [...document.querySelectorAll( '#ctl-options #ctl-current+table label' )];
				const label  = labels[0];
				label.click();

				settings.saveLabel();

				labels = [...document.querySelectorAll( '#ctl-options #ctl-current+table label' )];

				expect( labels.length ).toBe( 2 );
				expect( spyHideEditLabelInput ).toHaveBeenCalledTimes( 1 );
				expect( spyHideEditLabelInput ).toHaveBeenCalledWith();
			}
		);

		test( 'Do NOT save label when label is not unique', () => {
				document.body.innerHTML = getTables();

				const settings              = new Settings();

				let labels = [...document.querySelectorAll( '#ctl-options #ctl-current+table label' )];
				const label  = labels[0];
				label.click();

				const editLabelInput = document.getElementById( 'ctl-edit-label' );

				editLabelInput.value = 'Б';

				settings.saveLabel();

				labels = [...document.querySelectorAll( '#ctl-options #ctl-current+table label' )];

				expect( labels.length ).toBe( 2 );
				expect( editLabelInput.classList.contains( 'ctl-edit-label-error' ) ).toBe( true );
			}
		);

		test( 'Save label', () => {
				document.body.innerHTML = getTables();

				const settings           = new Settings();
				const spySetSubmitStatus = jest.spyOn( settings, 'setSubmitStatus' );

				let labels = [...document.querySelectorAll( '#ctl-options #ctl-current+table label' )];
				let label  = labels[0];
				label.click();

				const editLabelInput = document.getElementById( 'ctl-edit-label' );
				const newValue       = 'Й';

				editLabelInput.value = ' ' + newValue + '  ';

				settings.saveLabel();

				labels = [...document.querySelectorAll( '#ctl-options #ctl-current+table label' )];
				label  = labels[0];

				const inputs = [...document.querySelectorAll( '#ctl-options #ctl-current+table input' )];
				const input  = inputs[0];

				expect( labels.length ).toBe( 2 );
				expect( label.innerHTML ).toBe( newValue );
				expect( input.name ).toBe( 'cyr_to_lat_settings[bel][' + newValue + ']' );
				expect( spySetSubmitStatus ).toHaveBeenCalledTimes( 1 );
			}
		);

		test( 'Save label on blur, escape and enter', () => {
				document.body.innerHTML = getTables();

				const settings           = new Settings();
				const spySaveLabel = jest.spyOn( settings, 'saveLabel' );

				let labels = [...document.querySelectorAll( '#ctl-options #ctl-current+table label' )];
				let label  = labels[0];

				label.click();

				const editLabelInput = document.getElementById( 'ctl-edit-label' );

				let event = new Event( 'blur' );
				editLabelInput.dispatchEvent( event );

				event = new Event( 'keyup' );
				event.key = 'Escape';
				editLabelInput.dispatchEvent( event );

				event = new Event( 'keyup' );
				event.key = 'Enter';
				editLabelInput.dispatchEvent( event );

				expect( spySaveLabel ).toHaveBeenCalledTimes( 3 );
			}
		);

	}
);
