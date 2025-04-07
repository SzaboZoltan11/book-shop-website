class WishlistManager {
    get wishlist(): ReadonlyArray<{ book_id: number }>

    fetch(): void
    add(bookId: any): void
    remove(bookId: any): void
    addEventListener(event: 'update', handler: () => any): void
}

interface Window {
    readonly WishlistManager: WishlistManager
}
