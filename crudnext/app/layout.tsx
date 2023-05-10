import './globals.css'
import { Inter } from 'next/font/google'

const inter = Inter({ subsets: ['latin'] })

export const metadata = {
  title: 'Create Next App',
  description: 'Generated by create next app',
}

export default function RootLayout({
  children,
}: {
  children: React.ReactNode
}) {
  return (
    <html lang="en">
      <body className={inter.className}>

        <div className='Header'>
          <header className="bg-white">
            <nav className="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
              <div className="flex lg:flex-1">
                <a href="#" className="-m-1.5 p-1.5">
                  <span className="sr-only">Your Company</span>
                </a>
              </div>

              <div className="hidden lg:flex lg:gap-x-12">
                <a href="#" className="text-sm font-semibold leading-6 text-gray-900">Features</a>
                <a href="#" className="text-sm font-semibold leading-6 text-gray-900">Marketplace</a>
                <a href="#" className="text-sm font-semibold leading-6 text-gray-900">Company</a>
              </div>
              <div className="hidden lg:flex lg:flex-1 lg:justify-end">
                <a href="#" className="text-sm font-semibold leading-6 text-gray-900">Log in <span aria-hidden="true">&rarr;</span></a>
              </div>
            </nav>

          </header>
        </div>

        {children}
        <footer>Footer</footer>
      </body>
      
    </html>
  )
}
