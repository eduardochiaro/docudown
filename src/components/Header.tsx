import React from 'react';
import Image from 'next/image';
import Link from 'next/link';
import classNames from '../utils/classNames';
import useStaleSWR from '../utils/staleSWR';
import { Category } from '@prisma/client';
import { BookmarkIcon } from '@heroicons/react/24/outline';

const Header = () => {
  const { data } = useStaleSWR('/api/categories');

  return (
    <nav className="w-28 xl:w-56 flex flex-col justify-between min-h-screen border-r bg-gray-50 border-gray-200 dark:bg-gray-900 dark:border-gray-800">
      <div className="container flex flex-wrap items-center justify-between mx-auto">
        <Link href="#" className="flex items-center gap-3 px-4 pt-4 pb-10">
          <Image src={`https://flowbite.com/docs/images/logo.svg`} alt="Docudown" width={500} height={500} className="h-5 w-5 sm:h-10 sm:w-10" />
          <h1 className="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Docudown</h1>
        </Link>
        <div className="grow md:w-auto" id="navbar-dropdown">
          <ul className="p-8 mt-4 space-y-4 md:mt-0 md:text-sm md:font-medium">
            {data &&
              data.results.map((item: Category) => (
                <li key={item.id} className="relative">
                  <Link
                    href={`/${item.path}`}
                    className={classNames(
                      `flex items-center gap-2 py-2 pl-3 pr-4 md:p-0 rounded md:bg-transparent md:dark:hover:bg-transparent`,
                      `text-gray-700 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white`,
                    )}
                    aria-current="page"
                  >
                    <BookmarkIcon className="w-5" />
                    {item.title}
                  </Link>
                </li>
              ))}
          </ul>
        </div>
      </div>
    </nav>
  );
};

export default Header;
