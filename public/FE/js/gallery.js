/* Gallery page translations */
window.pageTranslations = {
    en: {
        'gallery.title': 'My Works.',
        'gallery.subtitle': 'Photography — is a kind of visual literature. When you shoot, you do something meaningful: you build a frame, turn something into it, remove something.',
        'gallery.filter': 'Select category',
        'gallery.all': 'All',
        'gallery.landscapes': 'Landscapes',
        'gallery.life': 'Life',
        'gallery.sea': 'Sea'
    },
    vi: {
        'gallery.title': 'Tác phẩm.',
        'gallery.subtitle': 'Nhiếp ảnh là một dạng văn chương thị giác. Khi chụp, bạn tạo nên một điều có ý nghĩa: xây dựng khuôn hình, đưa một điều vào đó và loại bỏ một điều khác.',
        'gallery.filter': 'Chọn danh mục',
        'gallery.all': 'Tất cả',
        'gallery.landscapes': 'Phong cảnh',
        'gallery.life': 'Đời sống',
        'gallery.sea': 'Biển'
    }
};

if (typeof applyLanguage === 'function') applyLanguage(window.localStorage.getItem('kool-language') || 'en');
