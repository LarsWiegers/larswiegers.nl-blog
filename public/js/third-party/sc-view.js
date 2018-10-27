/**
 *
 * Copyright 2016 Google Inc. All rights reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

'use strict';

window.customElements.define('sc-view', class extends HTMLElement {
	get route () {
		return this.getAttribute('route') || null;
	}

	in (data) {
		return new Promise((resolve, reject) => {
			const onTransitionEnd = () => {
				this.removeEventListener('transitionend', onTransitionEnd);
				resolve();
			};

			this.classList.add('visible');
			this.addEventListener('transitionend', onTransitionEnd);
		});
	}

	out (data) {
		return new Promise((resolve, reject) => {
			const onTransitionEnd = () => {
				this.removeEventListener('transitionend', onTransitionEnd);
				resolve();
			};

			this.classList.remove('visible');
			this.addEventListener('transitionend', onTransitionEnd);
		});
	}

	update (data) {
		return Promise.resolve();
	}

	constructor() {
		// If you define a constructor, always call super() first!
		// This is specific to CE and required by the spec.
		super();
	}
});
