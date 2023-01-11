import React from 'react';
import { marked } from 'marked';
import useStaleSWR from '../utils/staleSWR';
import styles from '../styles/Page.module.scss'

const Page = ({ category, page }: { category: string | string[] | undefined; page: string | string[] | undefined }) => {
  const { data } = useStaleSWR(`/api/pages/${page}`);
  return (
    <div className="grow max-w-xl mx-auto">
      {data &&
      <div className={`${styles['page']}`} dangerouslySetInnerHTML={{__html: marked.parse(data?.content)}}></div>
      }
    </div>
  );
}

export default Page;