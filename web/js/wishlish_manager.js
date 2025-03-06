(() => {
    class _Wishlist extends EventTarget {
        /** @type {Array<{ book_id: number }>} */           #wishlist
        /** @type {ReadonlyArray<{ book_id: number }>} */   get wishlist() { return this.#wishlist }
    
        constructor() {
            super()
            this.#wishlist = []
            this.fetch()
        }
    
        fetch() {
            fetch('/bookshop/web/api/wishlist.php')
                .then(v => v.json())
                .then(v => {
                    this.#wishlist.push(...v)
                    this.dispatchEvent(new Event('update'))
                })
        }
    
        /**
         * @param {any} bookId
         */
        add(bookId) {
            fetch('/bookshop/web/api/wishlist.php', {
                method: 'POST',
                body: JSON.stringify({
                    book_id: bookId
                }),
                headers: {
                    'Content-Type': 'application/json'
                }
            })
                .then(() => {
                    this.#wishlist.push({ book_id: bookId })
                    this.dispatchEvent(new Event('update'))
                })
        }
    
        /**
         * @param {any} bookId
         */
        remove(bookId) {
            fetch('/bookshop/web/api/wishlist.php?book_id=' + bookId, {
                method: 'DELETE',
                body: JSON.stringify({
                    book_id: bookId
                }),
                headers: {
                    'Content-Type': 'application/json'
                }
            })
                .then(() => {
                    const i = this.#wishlist.findIndex(v => v.book_id == bookId)
                    if (i < 0) return
                    this.#wishlist.splice(i, 1)
                    this.dispatchEvent(new Event('update'))
                })
        }
    }

    window['WishlistManager'] = new _Wishlist()
})()
