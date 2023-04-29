import type { NextApiRequest, NextApiResponse } from 'next';
import prisma from '@/utils/prisma';
import { Category } from '@prisma/client';

export default async function handler(req: NextApiRequest, res: NextApiResponse<Category|null>) {
  const { category } = req.query;
  const result = await prisma.category.findFirst({
    where: {
      path: category?.toString(),
    },
  });
  res.status(200).json(result);
}
