import { Head, Link } from '@inertiajs/react';
import { useEffect, useState } from 'react';
import PublicLayout from '@/Layouts/PublicLayout';
export default function NewsShow({ news, relatedNews }) {
    const [isMobile, setIsMobile] = useState(false);

    useEffect(() => {
        const checkIfMobile = () => {
            setIsMobile(window.innerWidth < 768);
        };

        checkIfMobile();
        window.addEventListener('resize', checkIfMobile);
        return () => window.removeEventListener('resize', checkIfMobile);
    }, []);

    return (
        <PublicLayout>
            <style jsx global>{`
                /* Ensure ReactQuill content displays properly */
                .ql-editor {
                    padding: 0 !important;
                }

                .ql-editor h1,
                .ql-editor h2,
                .ql-editor h3,
                .ql-editor h4,
                .ql-editor h5,
                .ql-editor h6 {
                    color: #f1f5f9 !important;
                    font-weight: 600 !important;
                    margin-top: 1.5em !important;
                    margin-bottom: 0.5em !important;
                    line-height: 1.3 !important;
                }

                .ql-editor h1 { font-size: 2em !important; }
                .ql-editor h2 { font-size: 1.5em !important; }
                .ql-editor h3 { font-size: 1.25em !important; }
                .ql-editor h4 { font-size: 1.1em !important; }
                .ql-editor h5 { font-size: 1em !important; }
                .ql-editor h6 { font-size: 0.9em !important; }

                .ql-editor p {
                    color: #cbd5e1 !important;
                    margin-bottom: 1em !important;
                    line-height: 1.7 !important;
                }

                .ql-editor strong, .ql-editor b {
                    color: #f1f5f9 !important;
                    font-weight: 600 !important;
                }

                .ql-editor em, .ql-editor i {
                    color: #cbd5e1 !important;
                    font-style: italic !important;
                }

                .ql-editor u {
                    color: #cbd5e1 !important;
                    text-decoration: underline !important;
                }

                .ql-editor a {
                    color: #60a5fa !important;
                    text-decoration: none !important;
                    transition: color 0.2s ease !important;
                }

                .ql-editor a:hover {
                    color: #93c5fd !important;
                    text-decoration: underline !important;
                }

                .ql-editor ul, .ql-editor ol {
                    color: #cbd5e1 !important;
                    padding-left: 1.5em !important;
                    margin-bottom: 1em !important;
                }

                .ql-editor li {
                    color: #cbd5e1 !important;
                    margin-bottom: 0.25em !important;
                }

                .ql-editor blockquote {
                    border-left: 4px solid #3b82f6 !important;
                    padding-left: 1em !important;
                    margin: 1.5em 0 !important;
                    color: #94a3b8 !important;
                    font-style: italic !important;
                }

                .ql-editor code {
                    background-color: #1e293b !important;
                    color: #f1f5f9 !important;
                    padding: 0.2em 0.4em !important;
                    border-radius: 0.25em !important;
                    font-size: 0.9em !important;
                }

                .ql-editor pre {
                    background-color: #1e293b !important;
                    color: #f1f5f9 !important;
                    padding: 1em !important;
                    border-radius: 0.5em !important;
                    overflow-x: auto !important;
                    margin: 1em 0 !important;
                }

                .ql-editor img {
                    border-radius: 0.5em !important;
                    border: 1px solid #475569 !important;
                    margin: 1em 0 !important;
                    max-width: 100% !important;
                    height: auto !important;
                }

                .ql-editor table {
                    width: 100% !important;
                    border-collapse: collapse !important;
                    margin: 1em 0 !important;
                }

                .ql-editor th, .ql-editor td {
                    border: 1px solid #475569 !important;
                    padding: 0.5em 1em !important;
                    text-align: left !important;
                }

                .ql-editor th {
                    background-color: #1e293b !important;
                    color: #f1f5f9 !important;
                    font-weight: 600 !important;
                }

                .ql-editor td {
                    color: #cbd5e1 !important;
                }
            `}</style>

            <div className="min-h-screen bg-slate-900 text-slate-100">
                <Head title={news.title} />

                {/* Header */}
                <div className="bg-gradient-to-br from-slate-950 via-blue-950 to-slate-900 border-b border-slate-800">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">
                        <div>
                            <Link
                                href={route('news.index')}
                                className="inline-flex items-center text-blue-400 hover:text-blue-300 mb-4 md:mb-6 transition-colors text-sm md:text-base"
                            >
                                <svg className="w-4 h-4 md:w-5 md:h-5 mr-1.5 md:mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                Back to News
                            </Link>

                            <h1 className="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold mb-3 md:mb-4 px-2 bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-cyan-300 text-center">
                                {news.title}
                            </h1>
                            <div className="flex flex-wrap items-center justify-center gap-x-2 gap-y-1 text-xs sm:text-sm text-slate-400">
                                <span>By <span className="text-blue-300">{news.writer_name}</span></span>
                                <span className="hidden sm:inline">•</span>
                                <span>{new Date(news.date).toLocaleDateString('en-US', {
                                    year: 'numeric',
                                    month: isMobile ? 'short' : 'long',
                                    day: 'numeric'
                                })}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div className="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 py-6 sm:py-8 lg:py-12">
                    <div className="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8">
                        {/* Main Content */}
                        <div className="lg:col-span-2">
                            <article className="bg-slate-800/60 rounded-xl border border-slate-700/50 shadow-2xl overflow-hidden backdrop-blur-sm">
                                <div className="overflow-hidden">
                                    <img
                                        src={`/storage/${news.image}`}
                                        alt={news.title}
                                        className="w-full h-auto max-h-[400px] sm:max-h-[500px] object-cover transition-transform duration-500 hover:scale-105"
                                        loading="lazy"
                                    />
                                </div>

                                <div className="p-4 sm:p-6 md:p-8">
                                    <div className="prose prose-sm sm:prose-base prose-invert max-w-none prose-headings:text-slate-100 prose-p:text-slate-300 prose-a:text-blue-400 hover:prose-a:text-blue-300 prose-strong:text-slate-100 prose-ul:list-disc prose-ol:list-decimal prose-li:marker:text-slate-500 prose-img:rounded-lg prose-img:border prose-img:border-slate-700/50">
                                        {/* ReactQuill content styling */}
                                        <style jsx>{`
                                            .prose h1, .prose h2, .prose h3, .prose h4, .prose h5, .prose h6 {
                                                color: #f1f5f9 !important;
                                                font-weight: 600 !important;
                                                margin-top: 1.5em !important;
                                                margin-bottom: 0.5em !important;
                                                line-height: 1.3 !important;
                                            }

                                            .prose h1 { font-size: 2em !important; }
                                            .prose h2 { font-size: 1.5em !important; }
                                            .prose h3 { font-size: 1.25em !important; }
                                            .prose h4 { font-size: 1.1em !important; }
                                            .prose h5 { font-size: 1em !important; }
                                            .prose h6 { font-size: 0.9em !important; }

                                            .prose p {
                                                color: #cbd5e1 !important;
                                                margin-bottom: 1em !important;
                                                line-height: 1.7 !important;
                                            }

                                            .prose strong, .prose b {
                                                color: #f1f5f9 !important;
                                                font-weight: 600 !important;
                                            }

                                            .prose em, .prose i {
                                                color: #cbd5e1 !important;
                                                font-style: italic !important;
                                            }

                                            .prose u {
                                                color: #cbd5e1 !important;
                                                text-decoration: underline !important;
                                            }

                                            .prose a {
                                                color: #60a5fa !important;
                                                text-decoration: none !important;
                                                transition: color 0.2s ease !important;
                                            }

                                            .prose a:hover {
                                                color: #93c5fd !important;
                                                text-decoration: underline !important;
                                            }

                                            .prose ul, .prose ol {
                                                color: #cbd5e1 !important;
                                                padding-left: 1.5em !important;
                                                margin-bottom: 1em !important;
                                            }

                                            .prose li {
                                                color: #cbd5e1 !important;
                                                margin-bottom: 0.25em !important;
                                            }

                                            .prose blockquote {
                                                border-left: 4px solid #3b82f6 !important;
                                                padding-left: 1em !important;
                                                margin: 1.5em 0 !important;
                                                color: #94a3b8 !important;
                                                font-style: italic !important;
                                            }

                                            .prose code {
                                                background-color: #1e293b !important;
                                                color: #f1f5f9 !important;
                                                padding: 0.2em 0.4em !important;
                                                border-radius: 0.25em !important;
                                                font-size: 0.9em !important;
                                            }

                                            .prose pre {
                                                background-color: #1e293b !important;
                                                color: #f1f5f9 !important;
                                                padding: 1em !important;
                                                border-radius: 0.5em !important;
                                                overflow-x: auto !important;
                                                margin: 1em 0 !important;
                                            }

                                            .prose img {
                                                border-radius: 0.5em !important;
                                                border: 1px solid #475569 !important;
                                                margin: 1em 0 !important;
                                                max-width: 100%;
                                            }
                                            
                                            .prose img:not([style*="width"]):not([style*="height"]) {
                                                height: auto !important;
                                            }

                                            .prose table {
                                                width: 100% !important;
                                                border-collapse: collapse !important;
                                                margin: 1em 0 !important;
                                            }

                                            .prose th, .prose td {
                                                border: 1px solid #475569 !important;
                                                padding: 0.5em 1em !important;
                                                text-align: left !important;
                                            }

                                            .prose th {
                                                background-color: #1e293b !important;
                                                color: #f1f5f9 !important;
                                                font-weight: 600 !important;
                                            }

                                            .prose td {
                                                color: #cbd5e1 !important;
                                            }
                                        `}</style>
                                        <div dangerouslySetInnerHTML={{ __html: news.description }} />
                                    </div>
                                </div>
                            </article>
                        </div>

                        {/* Sidebar */}
                        <div className="lg:col-span-1 space-y-6">
                            {/* Share Section */}
                            <div className="bg-slate-800/60 backdrop-blur-sm rounded-xl border border-slate-700/50 p-4 sm:p-6 shadow-xl">
                                <h3 className="text-lg sm:text-xl font-bold text-slate-100 mb-4 pb-2 border-b border-slate-700/50 flex items-center">
                                    <svg className="w-4 h-4 sm:w-5 sm:h-5 text-blue-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                                    </svg>
                                    Share this article
                                </h3>
                                <div className="flex flex-wrap gap-3">
                                    <button
                                        onClick={() => {
                                            const url = window.location.href;
                                            window.open(`https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`, '_blank', 'width=600,height=400');
                                        }}
                                        className="flex-1 min-w-[120px] flex items-center justify-center gap-2 px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl"
                                    >
                                        <svg className="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                        </svg>
                                        <span className="text-sm font-medium">Facebook</span>
                                    </button>
                                    <button
                                        onClick={() => {
                                            const url = window.location.href;
                                            const text = news.title;
                                            window.open(`https://twitter.com/intent/tweet?text=${encodeURIComponent(text)}&url=${encodeURIComponent(url)}`, '_blank', 'width=600,height=400');
                                        }}
                                        className="flex-1 min-w-[120px] flex items-center justify-center gap-2 px-4 py-2.5 bg-black hover:bg-gray-900 text-white rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl border border-gray-800"
                                    >
                                        <svg className="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                                        </svg>
                                        <span className="text-sm font-medium">X</span>
                                    </button>
                                    <button
                                        onClick={() => {
                                            navigator.clipboard.writeText(window.location.href);
                                            alert('Link copied to clipboard!');
                                        }}
                                        className="w-full flex items-center justify-center gap-2 px-4 py-2.5 bg-slate-700 hover:bg-slate-600 text-white rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl"
                                    >
                                        <svg className="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                        </svg>
                                        <span className="text-sm font-medium">Copy Link</span>
                                    </button>
                                </div>
                            </div>

                            {/* Author Card */}
                            <div className="bg-slate-800/60 backdrop-blur-sm rounded-xl border border-slate-700/50 p-4 sm:p-6 shadow-xl">
                                <h3 className="text-lg sm:text-xl font-bold text-slate-100 mb-4 pb-2 border-b border-slate-700/50 flex items-center">
                                    <svg className="w-4 h-4 sm:w-5 sm:h-5 text-blue-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    About the Author
                                </h3>
                                <div className="flex items-start gap-4">
                                    <div className="flex-shrink-0">
                                        <div className="w-16 h-16 rounded-full bg-gradient-to-br from-blue-500 to-cyan-400 flex items-center justify-center text-white text-2xl font-bold shadow-lg">
                                            {news.writer_name.charAt(0).toUpperCase()}
                                        </div>
                                    </div>
                                    <div className="flex-1">
                                        <p className="font-semibold text-lg text-slate-100 mb-1">{news.writer_name}</p>
                                        <p className="text-sm text-blue-400 mb-3">Faculty Writer</p>
                                        <p className="text-sm text-slate-400 leading-relaxed">
                                            Contributing writer sharing news and updates about campus events, activities, and student life at Universidad de Dagupan.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            {/* Related News */}
                            {relatedNews.length > 0 && (
                                <div className="bg-slate-800/60 backdrop-blur-sm rounded-xl border border-slate-700/50 p-4 sm:p-6 shadow-xl">
                                    <h3 className="text-lg sm:text-xl font-bold text-slate-100 mb-4 sm:mb-6 pb-2 sm:pb-3 border-b border-slate-700/50 flex items-center">
                                        <svg className="w-4 h-4 sm:w-5 sm:h-5 text-blue-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                        </svg>
                                        Related News
                                    </h3>
                                    <div className="space-y-5 sm:space-y-6">
                                        {relatedNews.slice(0, isMobile ? 3 : 4).map((article) => (
                                            <div key={article.id} className="group">
                                                <Link
                                                    href={route('news.show', article.slug)}
                                                    className="block hover:bg-slate-700/40 p-4 sm:p-5 rounded-2xl transition-all duration-300 hover:shadow-xl border border-slate-700/50 hover:border-slate-600/50"
                                                >
                                                    <div className="flex items-start space-x-5">
                                                        <div className="flex-shrink-0 w-32 h-28 sm:w-36 sm:h-32 overflow-hidden rounded-xl shadow-lg">
                                                            <img
                                                                src={`/storage/${article.image}`}
                                                                alt={article.title}
                                                                className="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500"
                                                                loading="lazy"
                                                            />
                                                        </div>
                                                        <div className="flex-1 min-w-0 pt-1">
                                                            <h4 className="text-base sm:text-lg lg:text-xl font-medium text-slate-100 group-hover:text-blue-300 line-clamp-3 transition-colors mb-2">
                                                                {article.title}
                                                            </h4>
                                                            <div className="flex items-center text-sm sm:text-base text-slate-400 bg-slate-800/50 px-3 py-1.5 rounded-full w-fit">
                                                                <svg className="w-4 h-4 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                                </svg>
                                                                <span>{new Date(article.date).toLocaleDateString('en-US', {
                                                                    month: 'short',
                                                                    day: 'numeric',
                                                                    year: 'numeric'
                                                                })}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </Link>
                                            </div>
                                        ))}
                                    </div>
                                </div>
                            )}
                        </div>
                    </div>
                </div>
            </div>
        </PublicLayout>
    );
}
